<?php

namespace Database\Seeders;

use App\Models\Center;
use App\Models\CenterManager;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Rating;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DemoAnalyticsSeeder extends Seeder
{
    public function run(): void
    {
        $targetEmail = 'ahmed.ali@example.com';

        $targetStudent = User::query()->firstOrCreate(
            ['email' => $targetEmail],
            [
                'name' => 'أحمد علي',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
            ]
        );

        $manager = CenterManager::query()
            ->where('email', $targetEmail)
            ->first();

        $centerIds = [];
        if ($manager) {
            $centerIds = [$manager->center_id];
        } else {
            $centerIds = Center::query()->pluck('id')->all();
        }

        $positiveComments = [
            'دورة ممتازة ومحتواها واضح.',
            'الشرح رائع والتنظيم ممتاز.',
            'استفدت كثيرًا، أنصح بها.',
            'المدرب متعاون ويشرح بهدوء.',
            'تجربة جميلة والمركز مرتب.',
        ];

        $negativeComments = [
            'المحتوى يحتاج تحديث وبعض الأمثلة قديمة.',
            'التنظيم كان ضعيفًا وتأخرنا أكثر من مرة.',
            'المقاعد غير كافية والقاعة مزدحمة.',
            'الشرح سريع جدًا ولم أفهم بعض النقاط.',
            'التواصل كان بطيئًا واحتجت متابعة أكثر.',
            'تجربة غير مرضية للأسف.',
        ];

        $ahmedCourseComments = [
            'دورة ممتازة جدًا، أسلوب الشرح واضح وممتع.',
            'استفدت كثيرًا من التطبيق العملي والمثال الواقعي.',
            'المحتوى مرتب لكن أتمنى زيادة الوقت للأسئلة.',
            'الدورة قوية ولكن تحتاج أمثلة أكثر على المشاريع.',
        ];

        $ahmedTutorComments = [
            'مدرب رائع ومتعاون ويجاوب على كل الاستفسارات.',
            'أسلوب تدريسه ممتاز لكن يحتاج تبسيط في بعض النقاط.',
        ];

        $ahmedCenterComments = [
            'مركز ممتاز وتعامل محترم، التجربة كانت جميلة.',
            'الاستقبال جيد لكن أتمنى تحسين تنظيم المواعيد.',
        ];

        $centerNegativeComments = [
            'المركز يحتاج تحسين في الاستقبال وتنظيم المواعيد.',
            'النظافة جيدة لكن الإرشادات غير واضحة.',
            'أتمنى تحسين خدمة العملاء وسرعة الرد.',
        ];

        foreach ($centerIds as $centerId) {
            $center = Center::find($centerId);
            if (! $center) {
                continue;
            }

            $courses = Course::query()
                ->where('center_id', $centerId)
                ->get();

            $tutors = Tutor::query()
                ->where('center_id', $centerId)
                ->get();

            if ($courses->isEmpty()) {
                continue;
            }

            $ahmedCourses = $courses->take(3);
            foreach ($ahmedCourses as $idx => $course) {
                $paymentType = ($idx % 2 === 0) ? 'on_campus' : 'bank';
                $status = ($idx === 0) ? 'approved' : 'pending';

                $proofPath = null;
                if ($paymentType === 'bank') {
                    $proofPath = "payments/ahmed_ali_proof_center_{$centerId}_course_{$course->id}.pdf";
                    $pdf = "%PDF-1.4\n1 0 obj<<>>endobj\ntrailer<<>>\n%%EOF\n";
                    Storage::disk('public')->put($proofPath, $pdf);
                }

                Enrollment::query()->updateOrCreate(
                    [
                        'user_id' => $targetStudent->id,
                        'course_id' => $course->id,
                    ],
                    [
                        'status' => $status,
                        'payment_type' => $paymentType,
                        'reservation_expiry' => $paymentType === 'on_campus' ? now()->addDays(2) : null,
                        'payment_proof' => $proofPath,
                    ]
                );

                Rating::query()->updateOrCreate(
                    [
                        'user_id' => $targetStudent->id,
                        'rateable_type' => Course::class,
                        'rateable_id' => $course->id,
                    ],
                    [
                        'rating' => ($idx === 0) ? 5 : 4,
                        'comment' => $ahmedCourseComments[$idx % count($ahmedCourseComments)],
                    ]
                );

                if ($course->tutor_id) {
                    Rating::query()->updateOrCreate(
                        [
                            'user_id' => $targetStudent->id,
                            'rateable_type' => Tutor::class,
                            'rateable_id' => $course->tutor_id,
                        ],
                        [
                            'rating' => 5,
                            'comment' => $ahmedTutorComments[$idx % count($ahmedTutorComments)],
                        ]
                    );
                }
            }

            Rating::query()->updateOrCreate(
                [
                    'user_id' => $targetStudent->id,
                    'rateable_type' => Center::class,
                    'rateable_id' => $center->id,
                ],
                [
                    'rating' => 5,
                    'comment' => $ahmedCenterComments[$centerId % count($ahmedCenterComments)],
                ]
            );

            // Create a small set of deterministic demo students per center.
            $students = collect();
            for ($i = 1; $i <= 12; $i++) {
                $email = "demo.student.{$centerId}.{$i}@example.com";

                $students->push(User::query()->firstOrCreate(
                    ['email' => $email],
                    [
                        'name' => "طالب تجريبي {$centerId}-{$i}",
                        'password' => Hash::make('123456'),
                        'email_verified_at' => now(),
                    ]
                ));
            }

            // Seed enrollments (mix of approved + pending) across courses.
            foreach ($students as $idx => $student) {
                // Spread students across courses.
                $course = $courses[$idx % $courses->count()];

                $already = Enrollment::query()
                    ->where('user_id', $student->id)
                    ->where('course_id', $course->id)
                    ->exists();

                if (! $already) {
                    Enrollment::query()->create([
                        'user_id' => $student->id,
                        'course_id' => $course->id,
                        'status' => ($idx % 4 === 0) ? 'pending' : 'approved',
                        // App code uses 'bank'|'on_campus' in places; payment_type is string now.
                        'payment_type' => ($idx % 3 === 0) ? 'bank' : 'on_campus',
                        'reservation_expiry' => ($idx % 3 === 0) ? null : now()->addDays(2),
                        'payment_proof' => null,
                    ]);
                }
            }

            
            $pendingStudents = collect();
            for ($i = 1; $i <= 10; $i++) {
                $email = "demo.pending.{$centerId}.{$i}@example.com";

                $pendingStudents->push(User::query()->firstOrCreate(
                    ['email' => $email],
                    [
                        'name' => "طالب طلب {$centerId}-{$i}",
                        'password' => Hash::make('123456'),
                        'email_verified_at' => now(),
                    ]
                ));
            }

            foreach ($pendingStudents as $idx => $student) {
                $course = $courses[$idx % $courses->count()];

                $paymentType = ($idx % 2 === 0) ? 'bank' : 'on_campus';
                $proofPath = null;

                if ($paymentType === 'bank') {
                    $proofPath = "payments/demo_proof_center_{$centerId}_{$student->id}_{$course->id}.pdf";

                    // Minimal placeholder PDF so the link opens/downloads.
                    $pdf = "%PDF-1.4\n1 0 obj<<>>endobj\ntrailer<<>>\n%%EOF\n";
                    Storage::disk('public')->put($proofPath, $pdf);
                }

                Enrollment::query()->updateOrCreate(
                    [
                        'user_id' => $student->id,
                        'course_id' => $course->id,
                    ],
                    [
                        'status' => 'pending',
                        'payment_type' => $paymentType,
                        'reservation_expiry' => $paymentType === 'on_campus' ? now()->addDays(2) : null,
                        'payment_proof' => $proofPath,
                    ]
                );
            }

            // Seed course ratings: ensure some low ratings with Arabic comments.
            foreach ($courses as $courseIndex => $course) {
                // Pick 6 students to rate each course.
                $raters = $students->slice(($courseIndex * 2) % $students->count(), 6);

                foreach ($raters as $raterIndex => $student) {
                    $isNegative = ($raterIndex % 3 === 0);
                    $ratingValue = $isNegative ? 1 + ($raterIndex % 2) : 4 + ($raterIndex % 2);

                    Rating::query()->updateOrCreate(
                        [
                            'user_id' => $student->id,
                            'rateable_type' => Course::class,
                            'rateable_id' => $course->id,
                        ],
                        [
                            'rating' => $ratingValue,
                            'comment' => $isNegative
                                ? $negativeComments[array_rand($negativeComments)]
                                : $positiveComments[array_rand($positiveComments)],
                        ]
                    );
                }
            }

            // Seed tutor ratings (if tutors exist) with a couple negative ones.
            if ($tutors->isNotEmpty()) {
                foreach ($tutors as $tutorIndex => $tutor) {
                    $raters = $students->slice(($tutorIndex * 3) % $students->count(), 5);

                    foreach ($raters as $raterIndex => $student) {
                        $isNegative = ($raterIndex % 4 === 0);
                        $ratingValue = $isNegative ? 2 : 5;

                        Rating::query()->updateOrCreate(
                            [
                                'user_id' => $student->id,
                                'rateable_type' => Tutor::class,
                                'rateable_id' => $tutor->id,
                            ],
                            [
                                'rating' => $ratingValue,
                                'comment' => $isNegative
                                    ? 'الشرح يحتاج تبسيط أكثر.'
                                    : 'مدرب ممتاز ومتعاون جدًا.',
                            ]
                        );
                    }
                }
            }

            // Seed a few center ratings so negative feedback can show for the center itself too.
            $centerRaters = $students->take(6);
            foreach ($centerRaters as $raterIndex => $student) {
                $isNegative = ($raterIndex % 3 === 0);
                $ratingValue = $isNegative ? 2 : 5;

                Rating::query()->updateOrCreate(
                    [
                        'user_id' => $student->id,
                        'rateable_type' => Center::class,
                        'rateable_id' => $center->id,
                    ],
                    [
                        'rating' => $ratingValue,
                        'comment' => $isNegative
                            ? $centerNegativeComments[array_rand($centerNegativeComments)]
                            : 'مركز ممتاز وخدمة محترمة.',
                    ]
                );
            }
        }
    }
}
