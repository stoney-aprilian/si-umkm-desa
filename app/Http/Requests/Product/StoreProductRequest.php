<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
                'required',
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

    public function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'exists' => ':attribute tidak ditemukan.',
            'unique' => ':attribute sudah digunakan.',
            'numeric' => ':attribute harus berupa angka.',
            'min' => ':attribute minimal :min.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',
            'max' => ':attribute maksimal :max KB.',
            'boolean' => ':attribute tidak valid.',
        ];
    }

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
