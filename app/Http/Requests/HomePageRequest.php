<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePageRequest extends FormRequest
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

            'home_title'=>'required|',
            'home_desc'=>'required|',
            'home_sub_title_other'=>'required|',
            'home_discription_other'=>'required|',
            'example_discription'=>'required|',
//            'example_one_photo'=>'required|',
//            'example_two_photo'=>'required|',
//            'example_three_photo'=>'required|',
//            'example_four_photo'=>'required|',
            'example_one_title'=>'required|',
            'example_two_title'=>'required|',
            'example_three_title'=>'required|',
            'example_four_title'=>'required|',
            'example_one_discription'=>'required|',
            'example_two_discription'=>'required|',
            'example_three_discription'=>'required|',
            'example_four_discription'=>'required|',





        ];
    }
}
