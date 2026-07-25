<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = [

        'umkm_id',

        'name',

        'slug',

        'description',

        'price',

        'image',

        'is_featured',

        'is_active',

    ];




    protected function casts(): array
    {
        return [

            'price' => 'integer',

            'is_featured' => 'boolean',

            'is_active' => 'boolean',

        ];
    }




    /**
     * Use slug for route model binding.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }




    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */


    public function umkm(): BelongsTo
    {
        return $this->belongsTo(Umkm::class);
    }




    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */


    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }



    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }



    public function scopeSearch(
        Builder $query,
        ?string $search
    ): Builder {

        if (blank($search)) {

            return $query;

        }



        return $query->where(function ($query) use ($search) {

            $query

                ->where('name', 'like', "%{$search}%")

                ->orWhere('slug', 'like', "%{$search}%")

                ->orWhere('description', 'like', "%{$search}%")

                ->orWhereHas('umkm', function ($query) use ($search) {

                    $query->where(
                        'business_name',
                        'like',
                        "%{$search}%"
                    );

                });

        });

    }
}
