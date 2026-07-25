<?php

namespace App\Http\Requests\Owner;

class UpdateProductRequest extends StoreProductRequest
{
    /**
     * Update product validation rules
     * inherit from store request.
     *
     * Rules are identical because:
     * - owner cannot change UMKM ownership
     * - owner cannot manage featured status
     * - image replacement remains optional
     */
}
