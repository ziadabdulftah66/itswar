<?php


namespace App\Http\Controllers;

use App\Models\Order;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function preperOnline(Request $request, Order $order)
    {
        try {

            //send post request to Tap, https://tap.company/sa/en/developers => charges => create a charge
            $client = new Client();

            $response = $client->post('https://api.tap.company/v2/charges', ['body' => json_encode([
                'amount' => settings('price'), 'currency' => 'SAR', "threeDSecure" => true, "save_card" => false, "customer" => [
                    "first_name" => "First Name", "email" => "email@email.com"
                ], "source" => [
                    "id" => $request['token']
                ],
                // "post" => [
                //     // post url
                //     "url" => route('orders.charge' , $request->order)
                // ],
                // redirect page after payment.
                "redirect" => ["url" => route('order.charge-redirect', $order->uuid)]
            ]), 'headers' => ['Content-type' => 'application/json', 'Authorization' => 'Bearer ' . config('app.keys.tap.sk')]]);
            $json_response = $response->getBody()->getContents();

            if ($response->getStatusCode() != 200) {
                return response()->json(result(0, "عذراً: حدث خلل أثناء عملية الإرسال، حاول في وقت آخر.", 500));
            };

            $response_contents = json_decode($json_response);

            $response_code = $response_contents->response->code;

            //create online payment if captured or need a redirect action 3D secure
            $charge_id = $response_contents->id;

            if (in_array($response_code, ["000", "100"])) {
                //so success or need to 3d secure
                //record a pending log

                if ($response_contents->status == 'INITIATED') {
                    return response()->json(result(1, $response_contents->transaction->url, $response_contents->response->code));
                }
            }

            if ($response_code == "000") {
                //CAPTURED : amount got charged successfully
                //not need to 3d secure
                //so success payment
                return response()->json(result(1, route('onlineSuccess'), 200));
            }

            if ($response_code != "100") {
                return response()->json(result(0, "عذراً: لم تتم عملية التحويل، رسالة الخطأ: " . $response_contents->response->message, $response_contents->response->code));
            }

            return response()->json(result(1, $response_contents->transaction->url, 200));
        } catch (\Exception $exception) {
            return response()->json(result(0, $exception->getMessage() . "عذراً: لم تتم عملية الدفع، يرجى التحقق من البطاقة أو مراجعة إدارة  شكراً لك", 500));
        }
    }
}
