<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactMail;
use App\Models\Admin;
use App\Models\ContactFincial;
use App\Models\ContactUs;
use App\Models\General_setting;
use App\Rules\ReCaptcha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Validator;
use App\Rules\Captcha;
class Contact_UsController extends Controller
{

    public function index()
    {
        return view('front.contact.contact_us');
    }


    public function store_contact(Request $request){

        $this->validate($request,[
            'name'=>'required',
            'title'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required',
            'g-recaptcha-response' => ['required', new ReCaptcha]

        ],
        [
            'name.required' => 'ادخل الأسم',
            'title.required' => 'ادخل الأسم',
            'email.required' => 'ادخل البريد الالكتروني',
            'email.email' => 'ادخل البريد الالكتروني',
            'phone.required' => 'ادخل رقم الجوال',
            'message.required' => 'ادخل الرسالة',
            'g-recaptcha-response.required' => 'ادخل recaptcha',
            'g-recaptcha-response.captcha' => 'ادخل recaptcha',
        ]);



    $data =  $request->all();
  //  $seting=General_setting::select('email')->first();
  //  Mail::to($seting->email)->send(new ContactMail($data));
    $contact = ContactUs::create($data);
        $title = 'تواصل معنا';

  //      Notification::send($admins, new \App\Notifications\MemberContact($contact->id,$title,$not_type));
    return redirect(route('contact_us'))->with('success', 'تم إرسال الرسالة بنجاح');

    }



}
