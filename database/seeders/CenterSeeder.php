<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Center;

class CenterSeeder extends Seeder
{
    public function run(): void
    {
        $centers = [
            ['name' => 'مركز المعرفة للتدريب', 'location' => 'شارع دبي – بنغازي', 'phone' => '0923456789', 'description' => 'دورات مهنية وتقوية الطلاب.', 'image' => null],
            ['name' => 'أكاديمية المستقبل', 'location' => 'الفويهات – بنغازي', 'phone' => '0912233445', 'description' => 'دورات تقنية ولغات وبرمجة.', 'image' => null],
            ['name' => 'معهد النجاح', 'location' => 'الهواري – بنغازي', 'phone' => '0945566778', 'description' => 'إدارة ومحاسبة ودعم فني.', 'image' => null],
            ['name' => 'أكاديمية المهارات الحديثة', 'location' => 'البركة – بنغازي', 'phone' => '0930099887', 'description' => 'مهارات شخصية وتصميم وتقنية.', 'image' => null],
            ['name' => 'مركز الريادة للتدريب', 'location' => 'الحدائق – بنغازي', 'phone' => '0914567890', 'description' => 'كورسات إدارة وريادة أعمال.', 'image' => null],
            ['name' => 'مركز القمة للتطوير', 'location' => 'قاريونس – بنغازي', 'phone' => '0927733110', 'description' => 'مركز تطوير إداري وتقني.', 'image' => null],
            ['name' => 'أكاديمية أفق المعرفة', 'location' => 'بنينا – بنغازي', 'phone' => '0947711188', 'description' => 'دورات تقوية وتدريب مهني.', 'image' => null],
            ['name' => 'مركز الرؤية الحديثة', 'location' => 'شارع عشرين – بنغازي', 'phone' => '0918877665', 'description' => 'كورسات لغات وبرمجة.', 'image' => null],
            ['name' => 'أكاديمية الخبراء', 'location' => 'الليثي – بنغازي', 'phone' => '0932288440', 'description' => 'دورات مهنية متقدمة.', 'image' => null],
            ['name' => 'مركز التطوير الشامل', 'location' => 'بوعطني – بنغازي', 'phone' => '0913344556', 'description' => 'دورات شاملة في عدة مجالات.', 'image' => null],

            ['name' => 'مركز الإبداع للتدريب', 'location' => 'السلماني – بنغازي', 'phone' => '0926677889', 'description' => 'تصميم، فوتوشوب، مونتاج.', 'image' => null],
            ['name' => 'أكاديمية النور', 'location' => 'البركة – بنغازي', 'phone' => '0912223344', 'description' => 'لغات وإنجليزي.', 'image' => null],
            ['name' => 'مركز النهضة', 'location' => 'حي السلام – بنغازي', 'phone' => '0943344556', 'description' => 'كورسات محاسبة.', 'image' => null],
            ['name' => 'أكاديمية الرابطة', 'location' => 'الكيش – بنغازي', 'phone' => '0929988776', 'description' => 'كورسات إدارة.', 'image' => null],
            ['name' => 'مركز التطوير الذهبي', 'location' => 'الصابري – بنغازي', 'phone' => '0915667788', 'description' => 'كورسات احترافية.', 'image' => null],
            ['name' => 'مركز المبدعون', 'location' => 'الكويفية – بنغازي', 'phone' => '0924455667', 'description' => 'دورات أشغال يدوية.', 'image' => null],
            ['name' => 'أكاديمية أجيال', 'location' => 'السرتي – بنغازي', 'phone' => '0948899001', 'description' => 'دورات أطفال وتعليم.', 'image' => null],
            ['name' => 'مركز براعم المستقبل', 'location' => 'الهواري – بنغازي', 'phone' => '0916655443', 'description' => 'دورات أطفال ولغات.', 'image' => null],
            ['name' => 'مركز التطوير التقني', 'location' => 'قنفودة – بنغازي', 'phone' => '0937755332', 'description' => 'كورسات تقنية.', 'image' => null],
            ['name' => 'أكاديمية التميز', 'location' => 'شارع عشرين – بنغازي', 'phone' => '0927788990', 'description' => 'لغات، برمجة، تصميم.', 'image' => null],

            ['name' => 'معهد الشرق الأوسط', 'location' => 'الفويهات – بنغازي', 'phone' => '0946677884', 'description' => 'دورات اقتصادية.', 'image' => null],
            ['name' => 'مركز الريادة الذكية', 'location' => 'الحدائق – بنغازي', 'phone' => '0912233990', 'description' => 'تقنية وإدارة.', 'image' => null],
            ['name' => 'أكاديمية العالمية', 'location' => 'الليثي – بنغازي', 'phone' => '0931122334', 'description' => 'لغات ومهارات.', 'image' => null],
            ['name' => 'مركز الطموح', 'location' => 'السلماني – بنغازي', 'phone' => '0928877660', 'description' => 'كورسات تطوير ذات.', 'image' => null],
            ['name' => 'مركز الرقي', 'location' => 'المدينة الرياضية – بنغازي', 'phone' => '0919988776', 'description' => 'دورات احترافية متنوعة.', 'image' => null],
        ];

        foreach ($centers as $center) {
            // Ensure required non-nullable fields have a value
            if (!array_key_exists('bank_account', $center)) {
                $center['bank_account'] = '';
            }

            Center::create($center);
        }
    }
}
