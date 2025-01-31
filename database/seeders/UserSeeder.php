<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Membuat user dengan data yang sudah ditentukan
        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => bcrypt('password123'), // Pastikan untuk mengenkripsi password
        ]);
    }
}
