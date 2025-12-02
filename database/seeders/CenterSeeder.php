<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Center;

class CenterSeeder extends Seeder
{
    public function run(): void
    {
        $logo = 'images/cat-logo.png'; // path in public folder

        $centers = [
            ['name' => 'مركز بنغازي التعليمي', 'location' => 'بنغازي', 'phone' => '061-1234567', 'bank_account' => '1234567890', 'image' => $logo],
            ['name' => 'مركز طرابلس التقني', 'location' => 'طرابلس', 'phone' => '021-2345678', 'bank_account' => '2345678901', 'image' => $logo],
            ['name' => 'مركز سبها التعليمي', 'location' => 'سبها', 'phone' => '047-3456789', 'bank_account' => '3456789012', 'image' => $logo],
            ['name' => 'مركز مصراتة التعليمي', 'location' => 'مصراتة', 'phone' => '051-4567890', 'bank_account' => '4567890123', 'image' => $logo],
            ['name' => 'مركز الزاوية التقني', 'location' => 'الزاوية', 'phone' => '013-5678901', 'bank_account' => '5678901234', 'image' => $logo],
            ['name' => 'مركز البيضاء التعليمي', 'location' => 'البيضاء', 'phone' => '065-6789012', 'bank_account' => '6789012345', 'image' => $logo],
            ['name' => 'مركز زليتن التعليمي', 'location' => 'زليتن', 'phone' => '062-7890123', 'bank_account' => '7890123456', 'image' => $logo],
            ['name' => 'مركز صبراته التعليمي', 'location' => 'صبراته', 'phone' => '014-8901234', 'bank_account' => '8901234567', 'image' => $logo],
            ['name' => 'مركز غريان التقني', 'location' => 'غريان', 'phone' => '012-9012345', 'bank_account' => '9012345678', 'image' => $logo],
            ['name' => 'مركز ترهونة التعليمي', 'location' => 'ترهونة', 'phone' => '015-0123456', 'bank_account' => '0123456789', 'image' => $logo],
            ['name' => 'مركز جادو التعليمي', 'location' => 'جادو', 'phone' => '016-1234567', 'bank_account' => '1234567890', 'image' => $logo],
            ['name' => 'مركز رقدالين التقني', 'location' => 'رقدالين', 'phone' => '017-2345678', 'bank_account' => '2345678901', 'image' => $logo],
            ['name' => 'مركز صرمان التعليمي', 'location' => 'صرمان', 'phone' => '018-3456789', 'bank_account' => '3456789012', 'image' => $logo],
            ['name' => 'مركز ترهونة التقني', 'location' => 'ترهونة', 'phone' => '019-4567890', 'bank_account' => '4567890123', 'image' => $logo],
            ['name' => 'مركز هون التعليمي', 'location' => 'هون', 'phone' => '066-5678901', 'bank_account' => '5678901234', 'image' => $logo],
        ];

        foreach ($centers as $center) {
            Center::create($center);
        }
    }
}