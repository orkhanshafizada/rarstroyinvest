<?php

namespace App\Http\Requests\Partner;

use Illuminate\Foundation\Http\FormRequest;

class PartnerUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            'image'  => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
            'active' => 'required|integer',
            'sort'   => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'active.required' => __('Status') . ' ' . __('cannot be empty!'),
            'active.integer'  => __('Status') . ' ' . __('must be made of number only!'),
            'sort.required'   => __('Sort') . ' ' . __('cannot be empty!'),
            'sort.integer'    => __('Sort') . ' ' . __('must be made of number only!'),

            'image.required'  => __('Image') . ' ' . __('cannot be empty!'),
            'image.mimes'     => __('Image') . ' ' . __('format is not correct!'),
        ];
    }

}
