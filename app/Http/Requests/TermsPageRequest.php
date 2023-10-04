<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermsPageRequest extends FormRequest
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
            'terms_title'=>'required|min:5' ,
            'terms_desc'=> 'required|min:10' ,
        ];
    }
}
