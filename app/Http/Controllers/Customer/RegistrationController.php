<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\RegistrationEmailToCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('customer.auth.registration', compact('g_setting'));
    }

    public function store(Request $request)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $token = hash('sha256',time());

        $customer = new Customer();
        $data = $request->only($customer->getFillable());

        $request->validate(
            [
                'customer_name' => 'required',
                'customer_email' => 'required|email|unique:customers',
                'customer_password' => 'required',
                'customer_re_password' => 'required|same:customer_password'
            ],
            [],
            [
                'customer_name' => 'Customer Name',
                'customer_email' => 'Customer Email',
                'customer_password' => 'Customer Password',
                'customer_re_password' => 'Customer Retype Password'
            ]
        );

        if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ],
            [
                'g-recaptcha-response.required' => 'You must have to input recaptcha correctly'
            ]);
        }

        unset($request->customer_re_password);
        $data['customer_password'] = Hash::make($request->customer_password);
        $data['customer_phone'] = '';
        $data['customer_country'] = '';
        $data['customer_address'] = '';
        $data['customer_state'] = '';
        $data['customer_city'] = '';
        $data['customer_zip'] = '';
        $data['customer_token'] = $token;
        $data['customer_status'] = 'Pending';

        $customer->fill($data)->save();

        // Send Email
        $email_template_data = DB::table('email_templates')->where('id', 6)->first();
        $subject = $email_template_data->et_subject;
        $message = $email_template_data->et_content;

        $verification_link = url('customer/registration/verify/'.$token.'/'.$request->customer_email);

        $message = str_replace('[[verification_link]]', $verification_link, $message);

        Mail::to($request->customer_email)->send(new RegistrationEmailToCustomer($subject,$message));

        return redirect()->back()->with('success', 'Please check your email to verify your registration. Check your spam folder too.');
    }

    public function verify()
    {
        $email_from_url = request()->segment(count(request()->segments()));
        $aa = DB::table('customers')->where('customer_email', $email_from_url)->first();

        if(!$aa) {
            return redirect()->route('customer.login');
        }

        $expected_url = url('customer/registration/verify/'.$aa->customer_token.'/'.$aa->customer_email);
        $current_url = url()->current();
        if($expected_url != $current_url) {
            return redirect()->route('customer.login');
        }

        $data['customer_status'] = 'Active';
        $data['customer_token'] = '';
        Customer::where('customer_email',$email_from_url)->update($data);

        return redirect()->route('customer.login')->with('success', 'Registration is completed. You can now login.');
    }

}
