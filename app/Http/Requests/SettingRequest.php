<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'site_name'=>'min:2',
            'manager_phone'=>'min:2',
            'email'=>'email',
            'Tags'=>'min:2',
            'opening_words'=>'min:2',
            'address'=>'min:2',
            'location'=>'min:2',


        ];
    }
    public function messages()
    {
        return [


            'site_name.min' => '  ادخل الاسم الموقع',
            'manager_phone.min' => 'ادخل اسم المدير ',
            'email.email'=>'ادخل  صيغه البريد الالكتروني بطريقه صحيحه',
            'Tags.min' => '  ادخل النص',
            'opening_words.min' => '  ادخل النص',
            'address.min' => '  ادخل العنوان',
            'location.min' => '  ادخل الموقع الجغرافي',
            'funding_price.min' => '  اقل سعر هو واحد ',

        ];
    }
}
