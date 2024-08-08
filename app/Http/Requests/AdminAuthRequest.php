<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'email.required'            => __('Username').' '.__('cannot be empty!'),
            'password.required'         => __('Password').' '.__('cannot be empty!'),
            'email.string'              => __('Username or Password').' '.__('must be made of letters and numbers only!'),
            'password.string'           => __('Username or Password').' '.__('must be made of letters and numbers only!'),
        ];
    }

}
