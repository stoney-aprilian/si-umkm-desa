<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [

            'umkm_id' => [
                'required',
                'exists:umkms,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'is_featured' => [
                'nullable',
                'boolean',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],

        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa teks.',
            'exists' => ':attribute tidak ditemukan.',
            'numeric' => ':attribute harus berupa angka.',
            'min' => ':attribute minimal :min.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',
            'max' => ':attribute maksimal :max KB.',
            'boolean' => ':attribute tidak valid.',
        ];
    }

    /**
     * Get custom attribute names.
     */
    public function attributes(): array
    {
        return [
            'umkm_id' => 'UMKM',
            'name' => 'nama produk',
            'description' => 'deskripsi',
            'price' => 'harga',
            'image' => 'gambar produk',
            'is_featured' => 'produk unggulan',
            'is_active' => 'status',
        ];
    }
}
