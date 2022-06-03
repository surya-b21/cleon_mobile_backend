<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function gopay(Request $request)
    {
        $user = Auth::user();
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER');

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $request->harga,
            ),
            'payment_type' => 'gopay',
            'gopay' => array(
                'enable_callback' => true,  // optional
                'callback_url' => 'https://cleonmobile.page.link?link=https://cleonmobile.page.link?payment-status=success&id-paket=' . $request->id_paket   // optional
            ),
            'customer_details' => array(
                'first_name' => $user->name,
                'email' => $user->email,
            )
        );

        $response = \Midtrans\CoreApi::charge($params);

        return response()->json($response);
    }
}
