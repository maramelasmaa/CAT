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
            ['name' => 'أحمد علي', 'email' => 'ahmed1@example.com', 'password' => Hash::make('password123'), 'center_id' => 1],
            ['name' => 'فاطمة محمود', 'email' => 'fatma2@example.com', 'password' => Hash::make('password123'), 'center_id' => 2],
            ['name' => 'خالد عبدالله', 'email' => 'khaled3@example.com', 'password' => Hash::make('password123'), 'center_id' => 3],
            ['name' => 'سارة سالم', 'email' => 'sara4@example.com', 'password' => Hash::make('password123'), 'center_id' => 4],
            ['name' => 'مروان محمد', 'email' => 'marwan5@example.com', 'password' => Hash::make('password123'), 'center_id' => 5],
            ['name' => 'يوسف علي', 'email' => 'yousef6@example.com', 'password' => Hash::make('password123'), 'center_id' => 6],
            ['name' => 'منى أحمد', 'email' => 'mona7@example.com', 'password' => Hash::make('password123'), 'center_id' => 7],
            ['name' => 'حسين سعيد', 'email' => 'hussain8@example.com', 'password' => Hash::make('password123'), 'center_id' => 8],
            ['name' => 'رجاء محمود', 'email' => 'ragaa9@example.com', 'password' => Hash::make('password123'), 'center_id' => 9],
            ['name' => 'نور محمد', 'email' => 'noor10@example.com', 'password' => Hash::make('password123'), 'center_id' => 10],

            ['name' => 'عبدالله أحمد', 'email' => 'abdullah11@example.com', 'password' => Hash::make('password123'), 'center_id' => 11],
            ['name' => 'ريم عثمان', 'email' => 'reem12@example.com', 'password' => Hash::make('password123'), 'center_id' => 12],
            ['name' => 'سالم منصور', 'email' => 'salem13@example.com', 'password' => Hash::make('password123'), 'center_id' => 13],
            ['name' => 'إيناس خالد', 'email' => 'enas14@example.com', 'password' => Hash::make('password123'), 'center_id' => 14],
            ['name' => 'محمد أنور', 'email' => 'anwar15@example.com', 'password' => Hash::make('password123'), 'center_id' => 15],
            ['name' => 'ليلى محمد', 'email' => 'laila16@example.com', 'password' => Hash::make('password123'), 'center_id' => 16],
            ['name' => 'عادل سليمان', 'email' => 'adel17@example.com', 'password' => Hash::make('password123'), 'center_id' => 17],
            ['name' => 'هدى إبراهيم', 'email' => 'huda18@example.com', 'password' => Hash::make('password123'), 'center_id' => 18],
            ['name' => 'عبدالرحمن يوسف', 'email' => 'abdo19@example.com', 'password' => Hash::make('password123'), 'center_id' => 19],
            ['name' => 'خلود فرج', 'email' => 'khulood20@example.com', 'password' => Hash::make('password123'), 'center_id' => 20],

            ['name' => 'مهند كمال', 'email' => 'mohanad21@example.com', 'password' => Hash::make('password123'), 'center_id' => 21],
            ['name' => 'وليد عامر', 'email' => 'waleed22@example.com', 'password' => Hash::make('password123'), 'center_id' => 22],
            ['name' => 'رحاب أحمد', 'email' => 'rehab23@example.com', 'password' => Hash::make('password123'), 'center_id' => 23],
            ['name' => 'طارق فوزي', 'email' => 'tarek24@example.com', 'password' => Hash::make('password123'), 'center_id' => 24],
            ['name' => 'سمية خالد', 'email' => 'somaya25@example.com', 'password' => Hash::make('password123'), 'center_id' => 25],
        ];

        foreach ($managers as $manager) {
            CenterManager::create($manager);
        }
    }
}
