<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tutor;
use App\Models\Center;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Str;

class TutorSeeder extends Seeder
{
	public function run(): void
	{
		$names = [
			'أحمد علي', 'ليلى حسن', 'محمد سالم', 'سارة عمر', 'خالد مصطفى', 'منى الزاوي',
			'يوسف التومي', 'هالة فؤاد', 'سامي الشريف', 'نجلاء الحاسي', 'طارق الهوني',
			'ريم علي', 'فهد سالم', 'لينا يوسف', 'عماد مصطفى', 'عمر القادري', 'نجوى المرزوق'
		];

		$specializations = ['برمجة', 'إدارة', 'تصميم', 'لغات', 'حاسوب', 'تحليل بيانات', 'تسويق', 'شبكات', 'هندسة برمجيات'];

		// Absolute path to your local image
		$localImage = public_path('images/tutors/OIP (1).webp');

		foreach (Center::all() as $center) {

			$tutorCount = rand(8, 15);

			for ($i = 0; $i < $tutorCount; $i++) {

				// Copy the same image for each tutor
				$imagePath = null;

				if (file_exists($localImage)) {
					$newName = 'tutors/' . uniqid() . '.webp';
					Storage::disk('public')->put($newName, file_get_contents($localImage));
					$imagePath = $newName; // stored path
				}

				Tutor::create([
					'name' => $names[array_rand($names)] . ' ' . rand(1, 99),
					'phone' => '09' . rand(10000000, 99999999),
					'specialization' => $specializations[array_rand($specializations)],
					'center_id' => $center->id,
					'image' => $imagePath,
				]);
			}
		}
	}
}
