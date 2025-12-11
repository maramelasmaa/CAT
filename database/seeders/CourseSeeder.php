<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Tutor;
use Illuminate\Support\Facades\Storage;

class CourseSeeder extends Seeder
{
	public function run(): void
	{
		$courseTitles = [
			'أساسيات البرمجة', 'تطوير تطبيقات الويب', 'إدارة المشاريع', 'تصميم الجرافيك',
			'تحليل البيانات', 'تسويق إلكتروني', 'إدارة الوقت', 'مهارات القيادة',
			'اللغة الإنجليزية للمبتدئين', 'حاسوب متقدم', 'قواعد البيانات', 'الشبكات',
			'تصميم واجهات المستخدم', 'أمن المعلومات', 'الذكاء الاصطناعي', 'تحليل الأعمال'
		];

		// Local image to copy for ALL courses
		$localImage = public_path('images/courses/OIP.webp');

		foreach (Tutor::all() as $tutor) {

			$courseCount = rand(6, 12);

			for ($i = 0; $i < $courseCount; $i++) {

				// Copy image into storage/app/public/courses/
				$imagePath = null;
				if (file_exists($localImage)) {
					$newName = 'courses/' . uniqid() . '.webp';
					Storage::disk('public')->put($newName, file_get_contents($localImage));
					$imagePath = $newName;
				}

				$baseTitle = $courseTitles[array_rand($courseTitles)];
				$title = $baseTitle . ' - مستوى ' . rand(1, 4) . ' (دورة ' . rand(1, 999) . ')';
				$capacity = rand(15, 40);
				$available = rand(0, $capacity);

				Course::create([
					'title' => $title,
					'description' => "دورة $title يقدمها $tutor->name بمركز " . ($tutor->center ? $tutor->center->name : '' ) . ". المحاضرات عملية ونظرية.",
					'schedule' => ['الاثنين', 'الأربعاء', 'الجمعة'][array_rand(['الاثنين','الأربعاء','الجمعة'])] . ' ' . rand(9, 18) . ':00',
					'capacity' => $capacity,
					'available_seats' => $available,
					'center_id' => $tutor->center_id,
					'tutor_id' => $tutor->id,
					'image' => $imagePath,
				]);
			}
		}
	}
}
