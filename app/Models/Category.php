<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];



    protected function casts(): array
    {
        return [
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

    public function umkms(): HasMany
    {
        return $this->hasMany(Umkm::class);
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

                ->orWhere('description', 'like', "%{$search}%");

        });

    }
}
