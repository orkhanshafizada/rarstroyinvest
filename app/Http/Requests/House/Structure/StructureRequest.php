<?php

namespace App\Http\Requests\House\Structure;

use Illuminate\Foundation\Http\FormRequest;

class StructureRequest extends FormRequest
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
            'ru_name' => 'required|string|max:255',
            'en_name' => 'required|string|max:255',
            'zh_name' => 'nullable|string|max:255',
            'active'   => 'required|integer',
            'sort'   => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'zh_name.required' => __('Name (ZH)') . ' ' . __('cannot be empty!'),
            'zh_name.string'   => __('Name (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_name.max'      => __('Name (ZH)') . ' ' . __('must be a maximum of 255 characters!'),

            'en_name.required' => __('Name (EN)') . ' ' . __('cannot be empty!'),
            'en_name.string'   => __('Name (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_name.max'      => __('Name (EN)') . ' ' . __('must be a maximum of 255 characters!'),

            'ru_name.required' => __('Name (RU)') . ' ' . __('cannot be empty!'),
            'ru_name.string'   => __('Name (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_name.max'      => __('Name (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'active.required'   => __('active') . ' ' . __('cannot be empty!'),
            'active.integer'    => __('active') . ' ' . __('must be made of number only!'),
            'sort.required'   => __('Sort') . ' ' . __('cannot be empty!'),
            'sort.integer'    => __('Sort') . ' ' . __('must be made of number only!'),
        ];
    }
}
