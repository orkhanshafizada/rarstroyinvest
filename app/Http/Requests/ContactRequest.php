<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|string',
            'message' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name').' '.__('cannot be empty!'),
            'name.string'   => __('Name').' '.__('must be made of letters and numbers only!'),
            'phone.required' => __('Phone').' '.__('cannot be empty!'),
            'phone.string'   => __('Phone').' '.__('must be made of letters and numbers only!'),
            'email.required' => __('E-mail').' '.__('cannot be empty!'),
            'email.string'   => __('E-mail').' '.__('must be made of letters and numbers only!'),

            'message.string'   => __('Message').' '.__('must be made of letters and numbers only!'),
        ];
    }
}
