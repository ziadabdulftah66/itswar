<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Notifications\NewOrder;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function charge(Request $request, Order $order)
    {
        Log::info($request->all());

        Log::info($request->source);

        if ($request->status == 'CAPTURED') {

            $payment_method =  \App\Models\Order::APPLE_PAY;

            if ($request->source['payment_method'] == 'VISA') {
                $payment_method = \App\Models\Order::VISA;
            }

            if ($request->source['payment_method'] == 'MADA') {
                $payment_method = \App\Models\Order::MADA;
            }

            if ($request->source['payment_method'] == 'MASTERCARD') {
                $payment_method = \App\Models\Order::MASTERCARD;
            }

            $order->update([
                'payment_method'    => $payment_method
            ]);
        }
    }

    public function process(Request $request,  Order $order)
    {
        if ($request->tap_id) {
            $url = 'https://api.tap.company/v2/charges/' . $request->tap_id;
            $headers = ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . config('app.keys.tap.sk')];
            $client = new Client();
            $response = $client->get($url, ['headers' => $headers]);
            $json_response = json_decode($response->getBody()->getContents());

            if ($json_response->status == 'CAPTURED') {

                $payment_method =  \App\Models\Order::APPLE_PAY;

                if ($json_response->source->payment_method == 'VISA') {
                    $payment_method = \App\Models\Order::VISA;
                }

                if ($json_response->source->payment_method == 'MADA') {
                    $payment_method = \App\Models\Order::MADA;
                }

                if ($json_response->source->payment_method == 'MASTERCARD') {
                    $payment_method = \App\Models\Order::MASTERCARD;
                }

                $order->update([
                    'payment_method'    => $payment_method
                ]);

                notifiyAllUsers((new NewOrder($order)));

                return redirect()->route('thank-you', $order->uuid);
            }
        }
    }
}
