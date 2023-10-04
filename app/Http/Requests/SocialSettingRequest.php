<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialSettingRequest extends FormRequest
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

                 'facebook'=>'min:2',
                 'twitter'=>'min:2',
                 'snap'=>'min:2',
                 'youtube'=>'min:2',
                 'instagram'=>'min:2',



        ];
    }

    public function messages()
    {
        return [
            'facebook.min' => '  ادخل رابط الفيسبوك',
            'twitter.min' => '  ادخل رابط تويتر',
            'snap.min' => '  ادخل رابط السناب',
            'youtube.min' => '  ادخل رابط يوتيوب',
            'instagram.min' => '  ادخل رابط الانستجرام',

        ];
    }
}
