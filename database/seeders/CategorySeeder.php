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
            [
                'name' => 'Kuliner',
                'description' => 'Berbagai produk makanan dan minuman yang diproduksi oleh UMKM lokal.',
            ],
            [
                'name' => 'Fashion & Busana',
                'description' => 'Produk pakaian, konveksi, aksesoris, dan perlengkapan fashion.',
            ],
            [
                'name' => 'Kerajinan Tangan',
                'description' => 'Produk kerajinan yang dibuat secara manual maupun semi-manual.',
            ],
            [
                'name' => 'Pertanian',
                'description' => 'Hasil pertanian segar maupun olahan dari pelaku UMKM.',
            ],
            [
                'name' => 'Peternakan',
                'description' => 'Produk hasil peternakan beserta olahannya.',
            ],
            [
                'name' => 'Perikanan',
                'description' => 'Produk hasil budidaya dan olahan perikanan.',
            ],
            [
                'name' => 'Jasa',
                'description' => 'Berbagai layanan yang disediakan oleh pelaku UMKM.',
            ],
            [
                'name' => 'Lainnya',
                'description' => 'Kategori untuk produk atau usaha yang belum termasuk kategori lain.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'is_active' => true,
            ]);
        }
    }
}
