<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gean de Lima', 
            'email' => 'glr1@discente.ifpe.edu.br', 
            'password' => Hash::make('password'),
            'role' => 'admin'
        ]);
    }
}
