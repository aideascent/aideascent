<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Hash;
use DB;

class LoginController extends Controller
{
	public function __construct()
    {
    	$this->middleware(function ($request, $next) {
			if($request->session()->has('customer_status')) {
				return redirect()->route('customer.dashboard');
			}
			return $next($request);
		});
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
    	return view('customer.auth.login', compact('g_setting'));
    }

    public function store(Request $request)
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();

        $request->validate(
            [
                'customer_email' => 'required|email',
                'customer_password' => 'required',
            ], [],
            [
                'customer_email' => 'Customer Email',
                'customer_password' => 'Customer Password'
            ]
        );

       /*  if($g_setting->google_recaptcha_status == 'Show') {
            $request->validate([
                'g-recaptcha-response' => 'required'
            ],
            [
                'g-recaptcha-response.required'    => 'You must have to input recaptcha correctly'
            ]);
        } */

        $check_email = Customer::where('customer_email',$request->customer_email)->first();
        if(!$check_email)
        {
        	return redirect()->back()->with('error', 'Email address not found');
        }
        else
        {
        	$saved_password = $check_email->customer_password;
        	$given_password = $request->customer_password;

        	if(\Hash::check($given_password,$saved_password) == false)
        	{
        		return redirect()->back()->with('error', 'Password is wrong');
        	}
        }

        if($check_email->customer_status!='Active') {
            return redirect()->back()->with('error', 'Customer is not active yet');
        }

        // Saving data into session
        session(['customer_id' => $check_email->id]); // customer_id is not a field in the customers table. It is just used to avoid conflict with the admin id.

        session(['customer_name' => $check_email->customer_name]);
        session(['customer_email' => $check_email->customer_email]);
        session(['customer_phone' => $check_email->customer_phone]);
        session(['customer_country' => $check_email->customer_country]);
        session(['customer_address' => $check_email->customer_address]);
        session(['customer_state' => $check_email->customer_state]);
        session(['customer_city' => $check_email->customer_city]);
        session(['customer_zip' => $check_email->customer_zip]);
        session(['customer_password' => $check_email->customer_password]);
        session(['customer_status' => $check_email->customer_status]);

        return redirect()->route('customer.dashboard');
    }
}
