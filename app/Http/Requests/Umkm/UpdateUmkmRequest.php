<?php

namespace App\Http\Requests\Umkm;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUmkmRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }



    public function rules(): array
    {
        return [

            'user_id' => [
                'required',
                'exists:users,id',
            ],


            'category_id' => [
                'required',
                'exists:categories,id',
            ],


            'business_name' => [
                'required',
                'string',
                'max:150',
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
                'max:500',
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
            ],


            'banner' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
            ],


            'status' => [
                'nullable',
                'in:pending,approved,rejected',
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

            'string' => ':attribute harus berupa teks.',

            'exists' => ':attribute tidak ditemukan.',

            'url' => ':attribute harus berupa URL yang valid.',

            'image' => ':attribute harus berupa gambar.',

            'mimes' => ':attribute harus berformat JPG, JPEG, PNG, atau WEBP.',

            'max' => ':attribute maksimal :max KB.',

            'boolean' => ':attribute tidak valid.',

            'in' => ':attribute tidak valid.',

        ];
    }





    public function attributes(): array
    {
        return [

            'user_id' => 'pemilik UMKM',

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

            'status' => 'status',

            'is_active' => 'status aktif',

        ];
    }
}
