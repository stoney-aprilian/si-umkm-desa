<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            OwnerSeeder::class,
            CategorySeeder::class,

            // Aktifkan nanti ketika sudah selesai
            // UmkmSeeder::class,
            // ProductSeeder::class,
        ]);
    }
}
