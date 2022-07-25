<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalController extends Controller
{
    public function goPayment()
    {
        return view('products.welcome');
    }


    public function payment()
    {
        $data = [];
        $data['items'] =
        [
            [
                'name'        => 'Apple',
                'price'       => 100,
                'description' => 'Macbook Pro 14 Inch',
                'qty'         => 1
            ]
        ];
        $data['invoice_id']          = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data['return_url']          = route('payment-success');
        $data['cancel_url']          = route('payment-cancel');
        $data['total']               = 100;

        $provider = new ExpressCheckout;
        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data,true);
        return redirect($response['paypal_link']);
    }


    public function cancel()
    {
        dd('You Are Cancelled This Payment');
    }


    public function success(Request $request)
    {
        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING']))
        {
            dd('Your Payment Was Successfully');
        }
        dd('Please Try Again Later...!!');
    }
}
