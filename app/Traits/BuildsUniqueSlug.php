<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

trait BuildsUniqueSlug
{
    protected function generateUniqueSlug(
        Builder $query,
        string $value,
        ?int $ignoreId = null,
        string $column = 'slug'
    ): string {

        if (
            in_array(
                SoftDeletes::class,
                class_uses_recursive($query->getModel())
            )
        ) {
            $query = $query->withTrashed();
        }


        $slug = Str::slug($value);

        $original = $slug;

        $counter = 2;


        while (
            (clone $query)

                ->when(
                    $ignoreId,
                    function (Builder $query) use ($ignoreId) {

                        $query->where(
                            $query->getModel()->getKeyName(),
                            '!=',
                            $ignoreId
                        );

                    }
                )

                ->where($column, $slug)

                ->exists()
        ) {

            $slug = "{$original}-{$counter}";

            $counter++;

        }


        return $slug;
    }
}
