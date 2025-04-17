<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

User::create([
    'name' => 'Admin',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role' => 'admin'
]);

User::create([
    'name' => 'Kasir',
    'email' => 'kasir@example.com',
    'password' => Hash::make('password'),
    'role' => 'kasir'
]);

