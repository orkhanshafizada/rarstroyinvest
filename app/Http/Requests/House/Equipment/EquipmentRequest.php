<?php

namespace App\Http\Requests\House\Equipment;

use Illuminate\Foundation\Http\FormRequest;

class EquipmentRequest extends FormRequest
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
            'zh_content' => 'nullable|string',
            'zh_title'   => 'nullable|string|max:255',

            'en_content' => 'nullable|string',
            'en_title'   => 'nullable|string|max:255',

            'ru_content' => 'required|string',
            'ru_title'   => 'required|string|max:255',

            'house_id'     => 'required|int',
            'structure_id' => 'required|int',
            'sort'         => 'required|int',
        ];
    }

    public function messages()
    {
        return [
            'zh_content.required' => __('Content (ZH)') . ' ' . __('cannot be empty!'),
            'zh_content.string'   => __('Content (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_content.max'      => __('Content (ZH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_title.required'   => __('Title (ZH)') . ' ' . __('cannot be empty!'),
            'zh_title.string'     => __('Title (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_title.max'        => __('Title (ZH)') . ' ' . __('must be a maximum of 255 characters!'),

            'en_content.required' => __('Content (EN)') . ' ' . __('cannot be empty!'),
            'en_content.string'   => __('Content (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_content.max'      => __('Content (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_title.required'   => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'en_title.string'     => __('Title (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_title.max'        => __('Title (EN)') . ' ' . __('must be a maximum of 255 characters!'),

            'ru_content.required' => __('Content (RU)') . ' ' . __('cannot be empty!'),
            'ru_content.string'   => __('Content (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_content.max'      => __('Content (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_title.required'   => __('Title (RU)') . ' ' . __('cannot be empty!'),
            'ru_title.string'     => __('Title (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_title.max'        => __('Title (RU)') . ' ' . __('must be a maximum of 255 characters!'),

            'sort.required'         => __('Sort') . ' ' . __('cannot be empty!'),
            'sort.int'              => __('Sort') . ' ' . __('must be made of numbers only!'),
            'house_id.required'     => __('Sort') . ' ' . __('cannot be empty!'),
            'house_id.int'          => __('Sort') . ' ' . __('must be made of numbers only!'),
            'structure_id.required' => __('Sort') . ' ' . __('cannot be empty!'),
            'structure_id.int'      => __('Sort') . ' ' . __('must be made of numbers only!'),
        ];
    }
}
