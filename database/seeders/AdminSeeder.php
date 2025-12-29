<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin'),
            ]
        );

        Admin::updateOrCreate(
            ['email' => 'maram@gmail.com'],
            [
                'name' => 'Maram Elasma',
                'password' => Hash::make('123456'),
            ]
        );
    }
}