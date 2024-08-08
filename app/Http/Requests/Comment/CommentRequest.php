<?php

namespace App\Http\Requests\Comment;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'zh_full_name'   => 'nullable|string|max:255',
            'zh_description' => 'nullable|string',

            'en_full_name'   => 'required|string|max:255',
            'en_description' => 'required|string',

            'ru_full_name'   => 'required|string|max:255',
            'ru_description' => 'required|string',

            'active' => 'required|integer',
            'sort'   => 'required|integer',

            'image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
        ];
    }

    public function messages()
    {
        return [
            'zh_full_name.required'   => __('Full name (ZH)') . ' ' . __('cannot be empty!'),
            'zh_full_name.string'     => __('Full name (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_full_name.max'        => __('Full name (ZH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_description.required' => __('Description (ZH)') . ' ' . __('cannot be empty!'),
            'zh_description.string'   => __('Description (ZH)') . ' ' . __('must be made of letters and numbers only!'),

            'en_full_name.required'   => __('Full name (EN)') . ' ' . __('cannot be empty!'),
            'en_full_name.string'     => __('Full name (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_full_name.max'        => __('Full name (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_description.required' => __('Description (EN)') . ' ' . __('cannot be empty!'),
            'en_description.string'   => __('Description (EN)') . ' ' . __('must be made of letters and numbers only!'),

            'ru_full_name.required'   => __('Full name (RU)') . ' ' . __('cannot be empty!'),
            'ru_full_name.string'     => __('Full name (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_full_name.max'        => __('Full name (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_description.required' => __('Description (RU)') . ' ' . __('cannot be empty!'),
            'ru_description.string'   => __('Description (RU)') . ' ' . __('must be made of letters and numbers only!'),

            'active.required' => __('Status') . ' ' . __('cannot be empty!'),
            'active.integer'  => __('Status') . ' ' . __('must be made of number only!'),
            'sort.required'   => __('Sort') . ' ' . __('cannot be empty!'),
            'sort.integer'    => __('Sort') . ' ' . __('must be made of number only!'),

            'image.required' => __('Image') . ' ' . __('cannot be empty!'),
            'image.mimes'    => __('Image') . ' ' . __('format is not correct!'),
        ];
    }
}
