<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Hash;
use DB;
use App\Mail\OrderCompletedEmailToCustomer;
use Illuminate\Support\Facades\Mail;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


class CheckoutController extends Controller
{
    public function login(Request $request)
    {
        if(!session()->get('cart_product_id'))
        {
            return redirect()->to('/');
        }
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

        return redirect()->route('front.checkout')->with('success', 'You are successfully logged in as customer!');;
    }


    public function billing_shipping(Request $request)
    {
        if(!session()->get('cart_product_id'))
        {
            return redirect()->to('/');
        }
        $request->validate(
            [
                'billing_name' => 'required',
                'billing_email' => 'required|email',
                'billing_phone' => 'required',
                'billing_country' => 'required',
                'billing_address' => 'required',
                'billing_state' => 'required',
                'billing_city' => 'required',
                'billing_zip' => 'required',
            ]
        );

        session()->put('billing_name',$request->billing_name);
        session()->put('billing_email',$request->billing_email);
        session()->put('billing_phone',$request->billing_phone);
        session()->put('billing_country',$request->billing_country);
        session()->put('billing_address',$request->billing_address);
        session()->put('billing_state',$request->billing_state);
        session()->put('billing_city',$request->billing_city);
        session()->put('billing_zip',$request->billing_zip);

        session()->put('order_note',$request->order_note);

        if($request->name_click_shipping_same_check)
        {
            session()->put('name_click_shipping_same_check', $request->name_click_shipping_same_check);

            session()->put('shipping_name',$request->shipping_name);
            session()->put('shipping_email',$request->shipping_email);
            session()->put('shipping_phone',$request->shipping_phone);
            session()->put('shipping_country',$request->shipping_country);
            session()->put('shipping_address',$request->shipping_address);
            session()->put('shipping_state',$request->shipping_state);
            session()->put('shipping_city',$request->shipping_city);
            session()->put('shipping_zip',$request->shipping_zip);
        }
        else
        {
            session()->forget('name_click_shipping_same_check');
            session()->put('shipping_name',$request->billing_name);
            session()->put('shipping_email',$request->billing_email);
            session()->put('shipping_phone',$request->billing_phone);
            session()->put('shipping_country',$request->billing_country);
            session()->put('shipping_address',$request->billing_address);
            session()->put('shipping_state',$request->billing_state);
            session()->put('shipping_city',$request->billing_city);
            session()->put('shipping_zip',$request->billing_zip);
        }

        return redirect()->route('customer.payment');

    }

    public function payment()
    {
        if(!session()->get('cart_product_id'))
        {
            return redirect()->to('/');
        }

        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        return view('pages.payment', compact('g_setting'));
    }

    public function stripe()
    {
        if(!session()->get('cart_product_id'))
        {
            return redirect()->to('/');
        }

        if(session()->get('shipping_cost')) {
            $final_price = (session()->get('subtotal') + session()->get('shipping_cost'))-session()->get('coupon_amount');
        } else {
            $final_price =session()->get('subtotal') - session()->get('coupon_amount');
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        if(isset($_POST['stripeToken']))
        {
            \Stripe\Stripe::setVerifySslCerts(false);

			$token = $_POST['stripeToken'];
            $response = \Stripe\Charge::create([
                'amount' => $final_price*100,
                'currency' => 'usd',
                'description' => 'Stripe Payment',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

            $bal = \Stripe\BalanceTransaction::retrieve($response->balance_transaction);
            $balJson = $bal->jsonSerialize();

            $paid_amount = $balJson['amount']/100;
            $fee_amount  = $balJson['fee']/100;
            $net_amount  = $balJson['net']/100;

            $order_no = uniqid();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;

            $data = array();
            if(session()->get('customer_id'))
            {
                $data['customer_id'] = session()->get('customer_id');
                $data['customer_name'] = session()->get('customer_name');
                $data['customer_email'] = session()->get('customer_email');
                $data['customer_type'] = 'Returning Customer';
            }
            else
            {
                $data['customer_id'] = 0;
                $data['customer_name'] = session()->get('billing_name');
                $data['customer_email'] = session()->get('billing_email');
                $data['customer_type'] = 'Guest';
            }

            $data['billing_name'] = session()->get('billing_name');
            $data['billing_email'] = session()->get('billing_email');
            $data['billing_phone'] = session()->get('billing_phone');
            $data['billing_country'] = session()->get('billing_country');
            $data['billing_address'] = session()->get('billing_address');
            $data['billing_state'] = session()->get('billing_state');
            $data['billing_city'] = session()->get('billing_city');
            $data['billing_zip'] = session()->get('billing_zip');

            $data['shipping_name'] = session()->get('shipping_name');
            $data['shipping_email'] = session()->get('shipping_email');
            $data['shipping_phone'] = session()->get('shipping_phone');
            $data['shipping_country'] = session()->get('shipping_country');
            $data['shipping_address'] = session()->get('shipping_address');
            $data['shipping_state'] = session()->get('shipping_state');
            $data['shipping_city'] = session()->get('shipping_city');
            $data['shipping_zip'] = session()->get('shipping_zip');

            $data['order_note'] = session()->get('order_note');
            $data['txnid'] = $response->balance_transaction;
            $data['shipping_cost'] = session()->get('shipping_cost');
            $data['coupon_code'] = session()->get('coupon_code');
            $data['coupon_discount'] = session()->get('coupon_amount');

            $data['paid_amount'] = $paid_amount;
            $data['fee_amount'] = $fee_amount;
            $data['net_amount'] = $net_amount;
            $data['card_last4'] = $response->payment_method_details->card->last4;
            $data['card_exp_month'] = $response->payment_method_details->card->exp_month;
            $data['card_exp_year'] = $response->payment_method_details->card->exp_year;
            $data['payment_method'] = 'Stripe';
            $data['payment_status'] = 'Completed';
            $data['order_no'] = $order_no;

            $data['created_at'] = date('Y-m-d H:i:s');

            DB::table('orders')->insert($data);


            $product_row = '';
            $arr_cart_product_id = array();
            $arr_cart_product_qty = array();

            $i=0;
            foreach(session()->get('cart_product_id') as $value) {
                $arr_cart_product_id[$i] = $value;
                $i++;
            }

            $i=0;
            foreach(session()->get('cart_product_qty') as $value) {
                $arr_cart_product_qty[$i] = $value;
                $i++;
            }

            for($i=0;$i<count($arr_cart_product_id);$i++)
            {
                $product_detail = DB::table('products')->where('id', $arr_cart_product_id[$i])->first();
                $data2 = array();
                $data2['order_id'] = $ai_id;
                $data2['product_id'] = $product_detail->id;
                $data2['product_name'] = $product_detail->product_name;
                $data2['product_price'] = $product_detail->product_current_price;
                $data2['product_qty'] = $arr_cart_product_qty[$i];
                $data2['payment_status'] = 'Completed';
                $data2['order_no'] = $order_no;
                $data2['created_at'] = date('Y-m-d H:i:s');
                DB::table('order_details')->insert($data2);

                // Update Stock in Database
                $current_stock = $product_detail->product_stock - $arr_cart_product_qty[$i];
                $data3['product_stock'] = $current_stock;
                DB::table('products')->where('id',$product_detail->id)->update($data3);

                $product_row .= '
                <b>Product #'.($i+1).'</b><br>
                Product Name: '.$product_detail->product_name.'<br>
                Product Price: $'.$product_detail->product_current_price.'<br>
                Product Quantity: '.$arr_cart_product_qty[$i].'<br>
                ';
            }


            // Send Email To Customer
            $payment_method = '
            Payment Method: Stripe<br>
            Card Last 4 Digit: '.$response->payment_method_details->card->last4.'<br>
            Card Expiry Month: '.$response->payment_method_details->card->exp_month.'<br>
            Card Expiry Year: '.$response->payment_method_details->card->exp_year;

            $email_template_data = DB::table('email_templates')->where('id', 8)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $message = str_replace('[[customer_name]]', session()->get('customer_name'), $message);
            $message = str_replace('[[order_number]]', $order_no, $message);
            $message = str_replace('[[payment_method]]', $payment_method, $message);
            $message = str_replace('[[payment_date_time]]', date('Y-m-d H:i:s'), $message);
            $message = str_replace('[[transaction_id]]', $response->balance_transaction, $message);
            $message = str_replace('[[shipping_cost]]', '$'.session()->get('shipping_cost'), $message);
            $message = str_replace('[[coupon_code]]', session()->get('coupon_code'), $message);
            $message = str_replace('[[coupon_discount]]', '$'.session()->get('coupon_amount'), $message);
            $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
            $message = str_replace('[[payment_status]]', 'Completed', $message);
            $message = str_replace('[[billing_name]]', session()->get('billing_name'), $message);
            $message = str_replace('[[billing_email]]', session()->get('billing_email'), $message);
            $message = str_replace('[[billing_phone]]', session()->get('billing_phone'), $message);
            $message = str_replace('[[billing_country]]', session()->get('billing_country'), $message);
            $message = str_replace('[[billing_address]]', session()->get('billing_address'), $message);
            $message = str_replace('[[billing_state]]', session()->get('billing_state'), $message);
            $message = str_replace('[[billing_city]]', session()->get('billing_city'), $message);
            $message = str_replace('[[billing_zip]]', session()->get('billing_zip'), $message);
            $message = str_replace('[[shipping_name]]', session()->get('shipping_name'), $message);
            $message = str_replace('[[shipping_email]]', session()->get('shipping_email'), $message);
            $message = str_replace('[[shipping_phone]]', session()->get('shipping_phone'), $message);
            $message = str_replace('[[shipping_country]]', session()->get('shipping_country'), $message);
            $message = str_replace('[[shipping_address]]', session()->get('shipping_address'), $message);
            $message = str_replace('[[shipping_state]]', session()->get('shipping_state'), $message);
            $message = str_replace('[[shipping_city]]', session()->get('shipping_city'), $message);
            $message = str_replace('[[shipping_zip]]', session()->get('shipping_zip'), $message);
            $message = str_replace('[[product_detail]]', $product_row, $message);

            Mail::to(session()->get('customer_email'))->send(new OrderCompletedEmailToCustomer($subject,$message));


            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

            session()->forget('name_click_shipping_same_check');

            session()->forget('shipping_name');
            session()->forget('shipping_email');
            session()->forget('shipping_phone');
            session()->forget('shipping_country');
            session()->forget('shipping_address');
            session()->forget('shipping_state');
            session()->forget('shipping_city');
            session()->forget('shipping_zip');

            session()->forget('order_note');

            session()->forget('cart_product_id');
            session()->forget('cart_product_qty');

            session()->forget('shipping_id');
            session()->forget('shipping_cost');

            session()->forget('coupon_code');
            session()->forget('coupon_amount');
            session()->forget('coupon_id');

            return Redirect()->to('/')->with('success', 'Payment is successful!');
        }
    }


    public function paypal()
    {
        if(!session()->get('cart_product_id'))
        {
            return redirect()->to('/');
        }

        if(session()->get('shipping_cost')) {
            $final_price = (session()->get('subtotal') + session()->get('shipping_cost'))-session()->get('coupon_amount');
        } else {
            $final_price =session()->get('subtotal') - session()->get('coupon_amount');
        }

        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'), // ClientID
                env('PAYPAL_SECRET_KEY') // ClientSecret
            )
        );

        $paymentId = request('paymentId');
        $payment = Payment::get($paymentId, $apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));

        $transaction = new Transaction();
        $amount = new Amount();
        $details = new Details();

        $details->setShipping(0)
                ->setTax(0)
                ->setSubtotal($final_price);

        $amount->setCurrency('USD');
        $amount->setTotal($final_price);
        $amount->setDetails($details);
        $transaction->setAmount($amount);

        $execution->addTransaction($transaction);

        $result = $payment->execute($execution, $apiContext);

        if($result->state == 'approved')
        {
            // $payer_info = 'Payer ID: '.$result->payer->payer_info->payer_id.'<br>';
            // $payer_info .= 'Email: '.$result->payer->payer_info->email.'<br>';
            // $payer_info .= 'First Name: '.$result->payer->payer_info->first_name.'<br>';
            // $payer_info .= 'Last Name: '.$result->payer->payer_info->last_name.'<br>';
            // $payer_info .= 'Country Code: '.$result->payer->payer_info->country_code.'<br>';

            // $payee_info = 'Merchant ID: '.$result->transactions[0]->payee->merchant_id.'<br>';
            // $payee_info .= 'Email: '.$result->transactions[0]->payee->email.'<br>';

            $paid_amount = $result->transactions[0]->amount->total;
            $fee_amount  = $result->transactions[0]->related_resources[0]->sale->transaction_fee->value;
            $net_amount  = $paid_amount-$fee_amount;

            $order_no = uniqid();

            $statement = DB::select("SHOW TABLE STATUS LIKE 'orders'");
            $ai_id = $statement[0]->Auto_increment;

            $data = array();
            if(session()->get('customer_id'))
            {
                $data['customer_id'] = session()->get('customer_id');
                $data['customer_name'] = session()->get('customer_name');
                $data['customer_email'] = session()->get('customer_email');
                $data['customer_type'] = 'Returning Customer';
            }
            else
            {
                $data['customer_id'] = 0;
                $data['customer_name'] = session()->get('billing_name');
                $data['customer_email'] = session()->get('billing_email');
                $data['customer_type'] = 'Guest';
            }

            $data['billing_name'] = session()->get('billing_name');
            $data['billing_email'] = session()->get('billing_email');
            $data['billing_phone'] = session()->get('billing_phone');
            $data['billing_country'] = session()->get('billing_country');
            $data['billing_address'] = session()->get('billing_address');
            $data['billing_state'] = session()->get('billing_state');
            $data['billing_city'] = session()->get('billing_city');
            $data['billing_zip'] = session()->get('billing_zip');

            $data['shipping_name'] = session()->get('shipping_name');
            $data['shipping_email'] = session()->get('shipping_email');
            $data['shipping_phone'] = session()->get('shipping_phone');
            $data['shipping_country'] = session()->get('shipping_country');
            $data['shipping_address'] = session()->get('shipping_address');
            $data['shipping_state'] = session()->get('shipping_state');
            $data['shipping_city'] = session()->get('shipping_city');
            $data['shipping_zip'] = session()->get('shipping_zip');

            $data['order_note'] = session()->get('order_note');
            $data['txnid'] = $paymentId;
            $data['shipping_cost'] = session()->get('shipping_cost');
            $data['coupon_code'] = session()->get('coupon_code');
            $data['coupon_discount'] = session()->get('coupon_amount');

            $data['paid_amount'] = $paid_amount;
            $data['fee_amount'] = $fee_amount;
            $data['net_amount'] = $net_amount;
            $data['card_last4'] = '';
            $data['card_exp_month'] = '';
            $data['card_exp_year'] = '';
            $data['payment_method'] = 'PayPal';
            $data['payment_status'] = 'Completed';
            $data['order_no'] = $order_no;

            $data['created_at'] = date('Y-m-d H:i:s');

            DB::table('orders')->insert($data);

            $product_row = '';
            $arr_cart_product_id = array();
            $arr_cart_product_qty = array();

            $i=0;
            foreach(session()->get('cart_product_id') as $value) {
                $arr_cart_product_id[$i] = $value;
                $i++;
            }

            $i=0;
            foreach(session()->get('cart_product_qty') as $value) {
                $arr_cart_product_qty[$i] = $value;
                $i++;
            }

            for($i=0;$i<count($arr_cart_product_id);$i++)
            {
                $product_detail = DB::table('products')->where('id', $arr_cart_product_id[$i])->first();
                $data2 = array();
                $data2['order_id'] = $ai_id;
                $data2['product_id'] = $product_detail->id;
                $data2['product_name'] = $product_detail->product_name;
                $data2['product_price'] = $product_detail->product_current_price;
                $data2['product_qty'] = $arr_cart_product_qty[$i];
                $data2['payment_status'] = 'Completed';
                $data2['order_no'] = $order_no;
                $data2['created_at'] = date('Y-m-d H:i:s');
                DB::table('order_details')->insert($data2);

                // Update Stock in Database
                $current_stock = $product_detail->product_stock - $arr_cart_product_qty[$i];
                $data3['product_stock'] = $current_stock;
                DB::table('products')->where('id',$product_detail->id)->update($data3);

                $product_row .= '
                <b>Product #'.($i+1).'</b><br>
                Product Name: '.$product_detail->product_name.'<br>
                Product Price: $'.$product_detail->product_current_price.'<br>
                Product Quantity: '.$arr_cart_product_qty[$i].'<br>
                ';

            }



            // Send Email To Customer
            $payment_method = 'Payment Method: PayPal';
            $email_template_data = DB::table('email_templates')->where('id', 8)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $message = str_replace('[[customer_name]]', session()->get('customer_name'), $message);
            $message = str_replace('[[order_number]]', $order_no, $message);
            $message = str_replace('[[payment_method]]', $payment_method, $message);
            $message = str_replace('[[payment_date_time]]', date('Y-m-d H:i:s'), $message);
            $message = str_replace('[[transaction_id]]', $paymentId, $message);
            $message = str_replace('[[shipping_cost]]', '$'.session()->get('shipping_cost'), $message);
            $message = str_replace('[[coupon_code]]', session()->get('coupon_code'), $message);
            $message = str_replace('[[coupon_discount]]', '$'.session()->get('coupon_amount'), $message);
            $message = str_replace('[[paid_amount]]', '$'.$paid_amount, $message);
            $message = str_replace('[[payment_status]]', 'Completed', $message);
            $message = str_replace('[[billing_name]]', session()->get('billing_name'), $message);
            $message = str_replace('[[billing_email]]', session()->get('billing_email'), $message);
            $message = str_replace('[[billing_phone]]', session()->get('billing_phone'), $message);
            $message = str_replace('[[billing_country]]', session()->get('billing_country'), $message);
            $message = str_replace('[[billing_address]]', session()->get('billing_address'), $message);
            $message = str_replace('[[billing_state]]', session()->get('billing_state'), $message);
            $message = str_replace('[[billing_city]]', session()->get('billing_city'), $message);
            $message = str_replace('[[billing_zip]]', session()->get('billing_zip'), $message);
            $message = str_replace('[[shipping_name]]', session()->get('shipping_name'), $message);
            $message = str_replace('[[shipping_email]]', session()->get('shipping_email'), $message);
            $message = str_replace('[[shipping_phone]]', session()->get('shipping_phone'), $message);
            $message = str_replace('[[shipping_country]]', session()->get('shipping_country'), $message);
            $message = str_replace('[[shipping_address]]', session()->get('shipping_address'), $message);
            $message = str_replace('[[shipping_state]]', session()->get('shipping_state'), $message);
            $message = str_replace('[[shipping_city]]', session()->get('shipping_city'), $message);
            $message = str_replace('[[shipping_zip]]', session()->get('shipping_zip'), $message);
            $message = str_replace('[[product_detail]]', $product_row, $message);

            Mail::to(session()->get('customer_email'))->send(new OrderCompletedEmailToCustomer($subject,$message));



            session()->forget('billing_name');
            session()->forget('billing_email');
            session()->forget('billing_phone');
            session()->forget('billing_country');
            session()->forget('billing_address');
            session()->forget('billing_state');
            session()->forget('billing_city');
            session()->forget('billing_zip');

            session()->forget('name_click_shipping_same_check');

            session()->forget('shipping_name');
            session()->forget('shipping_email');
            session()->forget('shipping_phone');
            session()->forget('shipping_country');
            session()->forget('shipping_address');
            session()->forget('shipping_state');
            session()->forget('shipping_city');
            session()->forget('shipping_zip');

            session()->forget('order_note');

            session()->forget('cart_product_id');
            session()->forget('cart_product_qty');

            session()->forget('shipping_id');
            session()->forget('shipping_cost');

            session()->forget('coupon_code');
            session()->forget('coupon_amount');
            session()->forget('coupon_id');

            return Redirect()->to('/')->with('success', 'Payment is successful!');
        }
        else
        {
            return redirect()->to('/');
        }




    }


}
