<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;
use Hash;

class PasswordChangeController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer');
    }

    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $customer_data = Customer::where('id',session()->get('customer_id'))->first();
        return view('customer.pages.password_change', compact('customer_data','g_setting'));
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'password' => 'required',
                're_password' => 'required|same:password',
            ],
            [],
            [
                'password' => 'Password',
                're_password' => 'Retype Password',
            ]
        );

        $data['customer_password'] = Hash::make($request->password);
        Customer::where('id',session()->get('customer_id'))->update($data);

        return redirect()->back()->with('success', 'Password is updated successfully!');

    }

}
