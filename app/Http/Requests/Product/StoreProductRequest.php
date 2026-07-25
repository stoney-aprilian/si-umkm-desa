<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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

                Rule::exists('umkms', 'id')
                    ->where(function ($query) {

                        $query
                            ->where('status', 'approved')
                            ->where('is_active', true);

                    }),

            ],



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

                'required',

                'integer',

                'min:0',

            ],



            'image' => [

                'nullable',

                'image',

                'mimes:jpg,jpeg,png,webp',

                'max:2048',

                'dimensions:max_width=2000,max_height=2000',

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

            'exists' => ':attribute tidak ditemukan atau belum aktif.',

            'string' => ':attribute harus berupa teks.',

            'integer' => ':attribute harus berupa angka bulat.',

            'min' => ':attribute minimal :min.',

            'image' => ':attribute harus berupa gambar.',

            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',

            'max' => ':attribute maksimal :max KB.',

            'dimensions' => ':attribute memiliki ukuran gambar terlalu besar.',

            'boolean' => ':attribute tidak valid.',

        ];
    }




    public function attributes(): array
    {
        return [

            'umkm_id' => 'UMKM',

            'name' => 'Nama produk',

            'description' => 'Deskripsi',

            'price' => 'Harga',

            'image' => 'Gambar produk',

            'is_featured' => 'Produk unggulan',

            'is_active' => 'Status',

        ];
    }
}
