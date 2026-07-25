<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
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

                Rule::unique('categories', 'name')
                    ->ignore($this->route('category')),

            ],



            'description' => [

                'nullable',

                'string',

                'max:500',

            ],



            'is_active' => [

                'nullable',

                'boolean',

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

            'boolean' => ':attribute tidak valid.',

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

            'is_active' => 'Status',

        ];
    }
}
