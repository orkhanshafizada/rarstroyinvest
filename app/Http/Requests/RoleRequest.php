<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:25|'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name').' '.__('cannot be empty!'),
            'name.string'   => __('Name').' '.__('must be made of letters only!'),
            'name.max'      => __('Name').' '.__('must be a maximum of 25 characters!'),
            'name.min'      => __('Name').' '.__('must be a minimum of 3 characters!'),
        ];
    }
}
