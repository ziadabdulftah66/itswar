<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MistakeRequest extends FormRequest
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


//            'mistake_one_photo'=>'required|',
//            'mistake_two_photo'=>'required|',
//            'mistake_three_photo'=>'required|',

            'mistake_one_title'=>'required|',
            'mistake_two_title'=>'required|',
            'mistake_three_title'=>'required|',

            'mistake_one_discription'=>'required|',
            'mistake_two_discription'=>'required|',
            'mistake_three_discription'=>'required|',






        ];
    }
}
