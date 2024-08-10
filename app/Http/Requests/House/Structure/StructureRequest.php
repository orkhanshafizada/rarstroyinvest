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
            'ru_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'zh_title' => 'nullable|string|max:255',
            'active'   => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'zh_title.required' => __('Title (ZH)') . ' ' . __('cannot be empty!'),
            'zh_title.string'   => __('Title (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_title.max'      => __('Title (ZH)') . ' ' . __('must be a maximum of 255 characters!'),

            'en_title.required' => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'en_title.string'   => __('Title (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_title.max'      => __('Title (EN)') . ' ' . __('must be a maximum of 255 characters!'),

            'ru_title.required' => __('Title (RU)') . ' ' . __('cannot be empty!'),
            'ru_title.string'   => __('Title (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_title.max'      => __('Title (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'active.required'   => __('active') . ' ' . __('cannot be empty!'),
            'active.integer'    => __('active') . ' ' . __('must be made of number only!'),
        ];
    }
}
