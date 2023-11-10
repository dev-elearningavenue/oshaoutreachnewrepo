<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactFormRequest extends Request
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
            'first_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'last_name' => array(
                'required',
                'regex:/[a-zA-Z_ ]+/',
                'min:3',
                'max:30'
            ),
            'email' => 'required|email',
            'phone' => 'required|min:10|max:15',
            'message' => 'required|min:5',
            'g-recaptcha-response' => 'required|recaptcha'
        ];
    }
}
