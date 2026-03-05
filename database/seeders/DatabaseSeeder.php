<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Hapa tunatengeneza Admin manually
        User::create([
            'name' => 'Admin B-Tech',
            'email' => 'admin@btech.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}