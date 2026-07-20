<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Kuliner',
            'Fashion',
            'Kerajinan',
            'Pertanian',
            'Peternakan',
            'Perikanan',
            'Jasa',
            'Lainnya',
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
                'description' => $category . ' UMKM',
                'is_active' => true,
            ]);
        }
    }
}
