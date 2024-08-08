<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
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
            'zh_title'   => 'nullable|string|max:255',
            'zh_link'    => 'nullable|string|max:255',
            'zh_content' => 'nullable|string',

            'en_title'   => 'required|string|max:255',
            'en_link'    => 'nullable|string|max:255',
            'en_content' => 'required|string',

            'ru_title'   => 'required|string|max:255',
            'ru_link'    => 'nullable|string|max:255',
            'ru_content' => 'required|string',

            'image'     => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
           // 'thumbnail' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
            'active'    => 'required|integer',
            'sort'      => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'zh_title.required'   => __('Title (CH)') . ' ' . __('cannot be empty!'),
            'zh_title.string'     => __('Title (CH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_title.max'        => __('Title (CH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_link.string'      => __('Link (CH)') . ' ' . __('must be made of letters and numbers only!'),
            'zh_link.max'         => __('Link (CH)') . ' ' . __('must be a maximum of 255 characters!'),
            'zh_content.required' => __('Content (CH)') . ' ' . __('cannot be empty!'),
            'zh_content.string'   => __('Content (CH)') . ' ' . __('must be made of letters and numbers only!'),


            'en_title.required'   => __('Title (EN)') . ' ' . __('cannot be empty!'),
            'en_title.string'     => __('Title (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_title.max'        => __('Title (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_link.string'      => __('Link (EN)') . ' ' . __('must be made of letters and numbers only!'),
            'en_link.max'         => __('Link (EN)') . ' ' . __('must be a maximum of 255 characters!'),
            'en_content.required' => __('Content (EN)') . ' ' . __('cannot be empty!'),
            'en_content.string'   => __('Content (EN)') . ' ' . __('must be made of letters and numbers only!'),


            'ru_title.required'   => __('Title (RU)') . ' ' . __('cannot be empty!'),
            'ru_title.string'     => __('Title (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_title.max'        => __('Title (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_link.string'      => __('Link (RU)') . ' ' . __('must be made of letters and numbers only!'),
            'ru_link.max'         => __('Link (RU)') . ' ' . __('must be a maximum of 255 characters!'),
            'ru_content.required' => __('Content (RU)') . ' ' . __('cannot be empty!'),
            'ru_content.string'   => __('Content (RU)') . ' ' . __('must be made of letters and numbers only!'),

            'active.required' => __('active') . ' ' . __('cannot be empty!'),
            'active.integer'  => __('active') . ' ' . __('must be made of number only!'),
            'sort.required'   => __('Sort') . ' ' . __('cannot be empty!'),
            'sort.integer'    => __('Sort') . ' ' . __('must be made of number only!'),

            'image.required'  => __('Image') . ' ' . __('cannot be empty!'),
            'image.mimes'     => __('Image') . ' ' . __('format is not correct!'),
            'thumbnail.mimes' => __('Thumbnail') . ' ' . __('format is not correct!'),
        ];
    }

}
