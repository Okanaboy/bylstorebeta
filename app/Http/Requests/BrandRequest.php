<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:categories|max:255',
            'slug' => 'required|unique:categories|max:255',
            'description' => 'required',
            'picture' => 'nullable|image',
            'category_id' => 'required',
            'metatitle' => 'required',
            'metakeyword' => 'required',
            'metadescription' => 'required',
        ];
    }
}
