<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Paymentorder;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:watch_payments', ['only' => ['index']]);
//
//        $this->middleware('can:delete_payments', ['only' => ['destroy']]);
//    }
    public function index($not_id=null){
        if($not_id != null){
            Notification::where('id',$not_id)->delete();
        }
        $payments=Paymentorder::orderBy('id','DESC')->get();
        return view('dashboard.payments.index',compact('payments'));
    }

    public function destroy($id)
    {
        $payment = Paymentorder::find($id);
        $payment->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }
}
