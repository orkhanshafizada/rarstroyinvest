<?php

namespace App\Http\Requests\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'zh_title'             => 'nullable|string|max:255',
            'en_title'             => 'required|string|max:255',
            'ru_title'             => 'required|string|max:255',
            'zh_long_description'  => 'nullable|string',
            'en_long_description'  => 'required|string',
            'ru_long_description'  => 'required|string',
            'zh_short_description' => 'nullable|string',
            'en_short_description' => 'required|string',
            'ru_short_description' => 'required|string',
           // 'image'                => 'required|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'zh_title.required'             => __('Title (ZH)') . ' ' . __('cannot be empty!'),
            'zh_title.string'               => __('Title (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_title.max'                  => __('Title (ZH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_long_description.string'    => __('Long description (ZH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_short_description.required' => __('Short description (ZH)') . ' ' . __('cannot be empty!'),
            'zh_short_description.string'   => __('Short description (ZH)') . ' ' . __('must be made of letters and numbers only!'),

            'en_title.required'             => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'en_title.string'               => __('Title (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_title.max'                  => __('Title (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_long_description.required'  => __('Long description (EN)') . ' ' . __('cannot be empty!'),
            'en_long_description.string'    => __('Long description (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_short_description.required' => __('Short description (EN)') . ' ' . __('cannot be empty!'),
            'en_short_description.string'   => __('Short description (EN)') . ' ' . __('must be made of letters and numbers only!'),

            'ru_title.required'             => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'ru_title.string'               => __('Title (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_title.max'                  => __('Title (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_long_description.required'  => __('Long description (RU)') . ' ' . __('cannot be empty!'),
            'ru_long_description.string'    => __('Long description (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_short_description.required' => __('Short description (RU)') . ' ' . __('cannot be empty!'),
            'ru_short_description.string'   => __('Short description (RU)') . ' ' . __('must be made of letters and numbers only!'),

            'image.required' => __('Image') . ' ' . __('cannot be empty!'),
            'image.mimes'    => __('Image') . ' ' . __('format is not correct!'),
        ];
    }

}
