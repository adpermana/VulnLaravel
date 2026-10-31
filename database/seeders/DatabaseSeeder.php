<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['username' => 'admin'],
            [
                'username' => 'admin',
                'name' => 'Administrator SPMB',
                'email' => 'admin@spmb.ac.id',
                'password' => Hash::make('admin123'),
                'role' => 'administrator',
            ]
        );

        User::firstOrCreate(
            ['username' => 'user01'],
            [
                'username' => 'user01',
                'name' => 'Budi Santoso',
                'email' => 'budi@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        User::firstOrCreate(
            ['username' => 'user02'],
            [
                'username' => 'user02',
                'name' => 'Siti Rahmawati',
                'email' => 'siti@example.com',
                'password' => Hash::make('user123'),
                'role' => 'user',
            ]
        );

        $this->call(PendaftarSeeder::class);
    }
}
