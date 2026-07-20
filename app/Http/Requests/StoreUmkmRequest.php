<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUmkmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'exists:users,id'],
            'category_id' => ['required', 'exists:categories,id'],

            'business_name' => ['required', 'string', 'max:255'],

            'description' => ['nullable', 'string'],

            'phone' => ['nullable', 'string', 'max:20'],

            'address' => ['nullable', 'string'],

            'village' => ['nullable', 'string', 'max:100'],

            'district' => ['nullable', 'string', 'max:100'],

            'regency' => ['nullable', 'string', 'max:100'],

            'maps_url' => ['nullable', 'url'],

            'status' => ['required', 'in:pending,approved,rejected'],

            'is_active' => ['nullable', 'boolean'],
        ];
    }
}
