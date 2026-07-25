<?php

namespace App\Http\Requests\Owner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
     * Validation rules.
     */
    public function rules(): array
    {
        return [

            'category_id' => [

                'required',

                Rule::exists(
                    'categories',
                    'id'
                )
                ->whereNull('deleted_at')
                ->where('is_active', true),

            ],



            'business_name' => [

                'required',

                'string',

                'max:255',

            ],



            'description' => [

                'nullable',

                'string',

                'max:1000',

            ],



            'phone' => [

                'required',

                'string',

                'max:20',

            ],



            'address' => [

                'required',

                'string',

            ],



            'village' => [

                'nullable',

                'string',

                'max:100',

            ],



            'district' => [

                'nullable',

                'string',

                'max:100',

            ],



            'regency' => [

                'nullable',

                'string',

                'max:100',

            ],



            'maps_url' => [

                'nullable',

                'url',

            ],



            'logo' => [

                'nullable',

                'image',

                'mimes:jpg,jpeg,png,webp',

                'max:2048',

                'dimensions:max_width=2000,max_height=2000',

            ],



            'banner' => [

                'nullable',

                'image',

                'mimes:jpg,jpeg,png,webp',

                'max:4096',

                'dimensions:max_width=3000,max_height=1500',

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

            'exists' => ':attribute tidak ditemukan.',

            'url' => ':attribute harus berupa URL yang valid.',

            'image' => ':attribute harus berupa gambar.',

            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',

            'max' => ':attribute maksimal :max KB.',

            'dimensions' => ':attribute memiliki ukuran gambar terlalu besar.',

        ];
    }



    /**
     * Custom attribute names.
     */
    public function attributes(): array
    {
        return [

            'category_id' => 'kategori',

            'business_name' => 'nama UMKM',

            'description' => 'deskripsi',

            'phone' => 'nomor telepon',

            'address' => 'alamat',

            'village' => 'desa',

            'district' => 'kecamatan',

            'regency' => 'kabupaten',

            'maps_url' => 'Google Maps',

            'logo' => 'logo',

            'banner' => 'banner',

        ];
    }
}
