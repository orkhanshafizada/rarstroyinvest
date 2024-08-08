<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'zh_title'         => 'nullable|string|max:255',
            'zh_short_content' => 'nullable|string',
            'zh_long_content'  => 'nullable|string',

            'en_title'         => 'required|string|max:255',
            'en_short_content' => 'required|string',
            'en_long_content'  => 'required|string',

            'ru_title'         => 'required|string|max:255',
            'ru_short_content' => 'required|string',
            'ru_long_content'  => 'required|string',

            'main_image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
        ];
    }

    public function messages()
    {
        return [
            'zh_title.required'         => __('Title (ZH)') . ' ' . __('cannot be empty!'),
            'zh_title.string'           => __('Title (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_title.max'              => __('Title (ZH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_short_content.required' => __('Short Content (ZH)') . ' ' . __('cannot be empty!'),
            'zh_short_content.string'   => __('Short Content (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_long_content.string'    => __('Long Content (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_long_content.required'  => __('Long Content (ZH)') . ' ' . __('cannot be empty!'),

            'en_title.required'         => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'en_title.string'           => __('Title (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_title.max'              => __('Title (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_short_content.required' => __('Short Content (EN)') . ' ' . __('cannot be empty!'),
            'en_short_content.string'   => __('Short Content (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_long_content.string'    => __('Long Content (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_long_content.required'  => __('Long Content (EN)') . ' ' . __('cannot be empty!'),

            'ru_title.required'         => __('Title (RU)') . ' ' . __('cannot be empty!'),
            'ru_title.string'           => __('Title (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_title.max'              => __('Title (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_short_content.required' => __('Short Content (RU)') . ' ' . __('cannot be empty!'),
            'ru_short_content.string'   => __('Short Content (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_long_content.string'    => __('Long Content (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_long_content.required'  => __('Long Content (RU)') . ' ' . __('cannot be empty!'),

            'main_image.required' => __('Main Image') . ' ' . __('cannot be empty!'),
            'main_image.mimes'    => __('Main Image') . ' ' . __('format is not correct!'),
        ];
    }
}
