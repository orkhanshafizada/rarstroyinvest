<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorStoreRequest extends FormRequest
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
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|int',
            'password' => 'required|min:6|max:15|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required'     => __('Fullname').' '.__(' cannot be empty!'),
            'fullname.string'       => __('Fullname').' '.__('must be made of letters only!'),

            'email.required'        => __('Username').' '.__('cannot be empty!'),
            'email.email'           => __('Username').' '.__('the format is not correct!'),
            'email.unique'          => __('Username').' '.__('You cannot register with this email!'),

            'role.required'         => __('Role').' '.__('cannot be empty!'),
            'role.int'              => __('Role').' '.__('must be made of letters only!'),

            'password.required'     => __('Password').' '.__('cannot be empty!'),
            'password.confirmed'    => __('Password').' '.__('does not match'),
            'password.max'          => __('Password').' '.__('must be a maximum of 15 characters!'),
            'password.min'          => __('Password').' '.__('must be a minimum of 6 characters!'),
        ];
    }
}
