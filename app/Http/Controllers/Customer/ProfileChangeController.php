<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class ProfileChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $customer_data = Customer::where('id',session()->get('customer_id'))->first();
        return view('customer.pages.profile_change', compact('customer_data','g_setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'customer_name' => 'required'
        ]);

        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_country'] = $request->customer_country;
        $data['customer_address'] = $request->customer_address;
        $data['customer_state'] = $request->customer_state;
        $data['customer_city'] = $request->customer_city;
        $data['customer_zip'] = $request->customer_zip;

        Customer::where('id',session()->get('customer_id'))->update($data); // customer_id is not a field in the customers table. It is just used to avoid conflict with the admin id.

        session(['customer_name' => $request->customer_name]);
        session(['customer_phone' => $request->customer_phone]);
        session(['customer_country' => $request->customer_country]);
        session(['customer_address' => $request->customer_address]);
        session(['customer_state' => $request->customer_state]);
        session(['customer_city' => $request->customer_city]);
        session(['customer_zip' => $request->customer_zip]);

        return redirect()->back()->with('success', 'Profile Information is updated successfully!');

    }

}
