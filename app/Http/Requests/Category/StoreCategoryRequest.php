<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    /**
     * Get validation rules.
     */
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categories', 'name'),
            ],


            'description' => [
                'nullable',
                'string',
                'max:500',
            ],

        ];
    }



    /**
     * Validation messages.
     */
    public function messages(): array
    {
        return [

            'required' => ':attribute wajib diisi.',

            'string' => ':attribute harus berupa teks.',

            'max' => ':attribute maksimal :max karakter.',

            'unique' => ':attribute sudah digunakan.',

        ];
    }



    /**
     * Attribute names.
     */
    public function attributes(): array
    {
        return [

            'name' => 'Nama kategori',

            'description' => 'Deskripsi',

        ];
    }
}
