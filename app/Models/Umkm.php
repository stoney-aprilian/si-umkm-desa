<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Umkm extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = [

        'user_id',

        'category_id',

        'business_name',

        'slug',

        'description',

        'phone',

        'address',

        'village',

        'district',

        'regency',

        'maps_url',

        'logo',

        'banner',

        'status',

        'is_active',

    ];





    protected function casts(): array
    {
        return [

            'is_active' => 'boolean',

            'status' => 'string',

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


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }



    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }





    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */


    public function scopeActive(
        Builder $query
    ): Builder {

        return $query->where(
            'is_active',
            true
        );

    }





    public function scopeApproved(
        Builder $query
    ): Builder {

        return $query->where(
            'status',
            'approved'
        );

    }





    public function scopePending(
        Builder $query
    ): Builder {

        return $query->where(
            'status',
            'pending'
        );

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

                ->where(
                    'business_name',
                    'like',
                    "%{$search}%"
                )


                ->orWhere(
                    'slug',
                    'like',
                    "%{$search}%"
                )


                ->orWhere(
                    'phone',
                    'like',
                    "%{$search}%"
                )


                ->orWhere(
                    'village',
                    'like',
                    "%{$search}%"
                )


                ->orWhere(
                    'district',
                    'like',
                    "%{$search}%"
                )


                ->orWhere(
                    'regency',
                    'like',
                    "%{$search}%"
                )



                ->orWhereHas(
                    'category',
                    function ($query) use ($search) {

                        $query->where(
                            'name',
                            'like',
                            "%{$search}%"
                        );

                    }
                )



                ->orWhereHas(
                    'user',
                    function ($query) use ($search) {

                        $query->where(
                            'name',
                            'like',
                            "%{$search}%"
                        );

                    }
                );


        });


    }
}
