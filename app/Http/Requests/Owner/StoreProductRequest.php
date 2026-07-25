<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized.
     */
    public function authorize(): bool
    {
        return auth()->check()
            && auth()->user()->isOwner();
    }



    /**
     * Get validation rules.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [

            'name' => [

                'required',

                'string',

                'max:150',

            ],



            'description' => [

                'nullable',

                'string',

                'max:1000',

            ],



            'price' => [

                'nullable',

                'integer',

                'min:0',

            ],



            'image' => [

                'nullable',

                'image',

                'mimes:jpg,jpeg,png,webp',

                'max:2048',

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

            'integer' => ':attribute harus berupa angka bulat.',

            'min' => ':attribute minimal :min.',

            'image' => ':attribute harus berupa gambar.',

            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',

            'boolean' => ':attribute tidak valid.',

        ];
    }



    /**
     * Attribute names.
     */
    public function attributes(): array
    {
        return [

            'name' => 'nama produk',

            'description' => 'deskripsi',

            'price' => 'harga',

            'image' => 'gambar produk',

            'is_active' => 'status',

        ];
    }
}
