<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    public function run(): void
    {
        $owners = [
            [
                'name' => 'Siti Aisyah',
                'email' => 'siti@umkm.test',
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi@umkm.test',
            ],
            [
                'name' => 'Dedi Hidayat',
                'email' => 'dedi@umkm.test',
            ],
        ];

        foreach ($owners as $owner) {
            User::updateOrCreate(
                [
                    'email' => $owner['email'],
                ],
                [
                    'name'     => $owner['name'],
                    'password' => Hash::make('password'),
                    'role'     => 'owner',
                ]
            );
        }
    }
}
