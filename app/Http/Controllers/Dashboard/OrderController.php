<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::where('payment','!=',null)->get();
        return view('dashboard.orders.index', compact('orders'));

    }

    public function details($id)
    {

        $Order = Order::findOrfail($id);
        return view('dashboard.orders.details', compact('Order'));
    }

    public function destroy($id)
    {

        $Order=Order::find($id);
        if(!$Order){
            return redirect()->route('orders.index')->with(['error' => 'هذا الطلب غير موجود']);
        }



        $Order->delete();


        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);



    }
}
