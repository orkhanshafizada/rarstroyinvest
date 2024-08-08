<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_keywords' => 'required|string|max:255',
            'meta_description' => 'required|string|max:500',
            'meta_author' => 'required|string|max:500',
            'facebook' => 'required|string|max:500',
            'linkedin' => 'required|string|max:255',
            'copyright' => 'required|string|max:500',
            'logo_white' => 'nullable|mimes:jpeg,jpg,png',
            'logo_colorful' => 'nullable|mimes:jpeg,jpg,png',
            'favicon' => 'nullable|mimes:jpeg,jpg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('Title').' '.__('cannot be empty!'),
            'title.string' => __('Title').' '.__('must be made of letters and numbers only!'),
            'title.max' => __('Title').' '.__('must be a maximum of 255 characters!'),

            'meta_title.required' => __('Meta Title').' '.__('cannot be empty!'),
            'meta_title.string' => __('Meta Title').' '.__('must be made of letters and numbers only!'),
            'meta_title.max' => __('Meta Title').' '.__('must be a maximum of 255 characters!'),

            'meta_keywords.required' => __('Meta Keywords').' '.__('cannot be empty!'),
            'meta_keywords.string' => __('Meta Keywords').' '.__('must be made of letters and numbers only!'),
            'meta_keywords.max' => __('Meta Keywords').' '.__('must be a maximum of 255 characters!'),

            'meta_description.required' => __('Meta Description').' '.__('cannot be empty!'),
            'meta_description.string' => __('Meta Description').' '.__('must be made of letters and numbers only!'),
            'meta_description.max' => __('Meta Description').' '.__('must be a maximum of 500 characters!'),

            'meta_author.required' => __('Meta Author').' '.__('cannot be empty!'),
            'meta_author.string' => __('Meta Author').' '.__('must be made of letters and numbers only!'),
            'meta_author.max' => __('Meta Author').' '.__('must be a maximum of 255 characters!'),

            'facebook.required' => __('Facebook').' '.__('cannot be empty!'),
            'facebook.string' => __('Facebook').' '.__('must be made of letters and numbers only!'),
            'facebook.max' => __('Facebook').' '.__('must be a maximum of 255 characters!'),

            'linkedin.required' => __('Twitter').' '.__('cannot be empty!'),
            'linkedin.string' => __('Twitter').' '.__('must be made of letters and numbers only!'),
            'linkedin.max' => __('Twitter').' '.__('must be a maximum of 255 characters!'),

            'copyright.required' => __('Footer').' '.__('cannot be empty!'),
            'copyright.string' => __('Footer').' '.__('must be made of letters and numbers only!'),
            'copyright.max' => __('Footer').' '.__('must be a maximum of 255 characters!'),

            'logo_white.mimes' => __('White Logo').' '.__('format is not correct!'),
            'logo_colorful.mimes' => __('Black Logo').' '.__('format is not correct!'),
            'favicon.mimes' => __('Favicon').' '.__('format is not correct!'),
        ];
    }
}
