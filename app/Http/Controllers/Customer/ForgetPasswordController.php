<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMessageToCustomer;
use App\Models\Customer;
use Illuminate\Http\Request;
use Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class ForgetPasswordController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('customer.auth.forget_password', compact('g_setting'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_email' => 'required|email'
        ],
        [],
        [
            'customer_email' => 'Customer Email'
        ]
        );

        $check_email = Customer::where('customer_email',$request->customer_email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', 'Email address not found');
        }
        else
        {
            $email_template_data = DB::table('email_templates')->where('id', 7)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $token = hash('sha256',time());
            $reset_link = url('customer/reset-password/'.$token.'/'.$request->customer_email);
            $message = str_replace('[[reset_link]]', $reset_link, $message);

            $data['customer_token'] = $token;
            Customer::where('customer_email',$request->customer_email)->update($data);

            Mail::to($request->customer_email)->send(new ResetPasswordMessageToCustomer($subject,$message));
        }

        return redirect()->back()->with('success', 'Please check your email for reset instruction');
    }

}
