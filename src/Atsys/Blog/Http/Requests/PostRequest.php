<?php

namespace Atsys\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'post_categories' => 'required|array',
            'post_categories.*' => 'exists:post_categories,id',
            'published' => 'required|boolean',
            'image' => 'file|image',
            'title.*' => "required",
            'subtitle.*' => "required",
            'alias.*' => "required",
            'meta_title.*' => "required",
            'meta_description.*' => "required",
            'short_description.*' => "required",
            'description.*' => "required",
        ];
    }
}
