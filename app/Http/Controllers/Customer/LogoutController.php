<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Hash;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        session()->forget('customer_id'); // customer_id is not a field in the customers table. It is just used to avoid conflict with the admin id.
        session()->forget('customer_name');
        session()->forget('customer_email');
        session()->forget('customer_phone');
        session()->forget('customer_country');
        session()->forget('customer_address');
        session()->forget('customer_state');
        session()->forget('customer_city');
        session()->forget('customer_zip');
        session()->forget('customer_password');
        session()->forget('customer_status');
        return redirect()->route('customer.login');
    }
}
