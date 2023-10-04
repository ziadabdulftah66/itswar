<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Contact_UsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('can:watch_contact', ['only' => ['index','showContact']]);
//
//    }

    public function index()
    {
        $contacts = ContactUs::all()->sortByDesc('id');

        return view('dashboard.settings.contact_us.index', compact('contacts'));
    }


    public function showContact($id,$not_id=null){
        if ($not_id != null){
            $not=Notification::find($not_id);
            $not->delete();
        }

        $contact = ContactUs::find($id);
        if($contact->status == '0')
        {
            $status = '1';

        }else {
            $status = '1';
        }
        $values = array('status'=> $status);

        DB::table('contact_us')->where('id',$id)->update($values);

        return view('dashboard.settings.contact_us.show', compact('contact'));

    }

    // public function isRead($id)
    // {
    //   $contact = ContactUs::find($id);


    //   return redirect(route('contact_us.show'));
    // }
}
