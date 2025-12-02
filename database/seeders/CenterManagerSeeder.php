<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CenterManager;
use Illuminate\Support\Facades\Hash;

class CenterManagerSeeder extends Seeder
{
    public function run(): void
    {
        $managers = [
            ['name' => 'أحمد علي', 'email' => 'ahmed.ali@example.com', 'password' => Hash::make('123456'), 'center_id' => 1],
            ['name' => 'ليلى حسن', 'email' => 'laila.hassan@example.com', 'password' => Hash::make('123456'), 'center_id' => 2],
            ['name' => 'محمد سالم', 'email' => 'mohamed.salem@example.com', 'password' => Hash::make('123456'), 'center_id' => 3],
            ['name' => 'سارة عمر', 'email' => 'sara.omar@example.com', 'password' => Hash::make('123456'), 'center_id' => 4],
            ['name' => 'خالد مصطفى', 'email' => 'khaled.mostafa@example.com', 'password' => Hash::make('123456'), 'center_id' => 5],
            ['name' => 'منى الزاوي', 'email' => 'mona.zawi@example.com', 'password' => Hash::make('123456'), 'center_id' => 6],
            ['name' => 'يوسف التومي', 'email' => 'yousef.toumi@example.com', 'password' => Hash::make('123456'), 'center_id' => 7],
            ['name' => 'هالة فؤاد', 'email' => 'hala.fouad@example.com', 'password' => Hash::make('123456'), 'center_id' => 8],
            ['name' => 'سامي الشريف', 'email' => 'sami.sharif@example.com', 'password' => Hash::make('123456'), 'center_id' => 9],
            ['name' => 'نجلاء الحاسي', 'email' => 'najla.hassi@example.com', 'password' => Hash::make('123456'), 'center_id' => 10],
            ['name' => 'طارق الهوني', 'email' => 'tareq.houni@example.com', 'password' => Hash::make('123456'), 'center_id' => 11],
            ['name' => 'ريم علي', 'email' => 'reem.ali@example.com', 'password' => Hash::make('123456'), 'center_id' => 12],
            ['name' => 'فهد سالم', 'email' => 'fahd.salem@example.com', 'password' => Hash::make('123456'), 'center_id' => 13],
            ['name' => 'لينا يوسف', 'email' => 'lina.youssef@example.com', 'password' => Hash::make('123456'), 'center_id' => 14],
            ['name' => 'عماد مصطفى', 'email' => 'emad.mostafa@example.com', 'password' => Hash::make('123456'), 'center_id' => 15],
        ];

        foreach ($managers as $manager) {
            CenterManager::create($manager);
        }
    }
}