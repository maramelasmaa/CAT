@extends('layouts.manager')

@section('title', 'التقييمات')

@section('content')

<div class="space-y-6">

    {{-- Center Summary --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-extrabold text-[#003366]">{{ $center->name }}</h2>
                <p class="text-sm text-gray-500 mt-1">تقييمات المركز والدورات والمدربين</p>
            </div>
            <div class="text-right">
                <div class="text-2xl font-extrabold text-[#003366]">
                    {{ number_format((float)($center->ratings_avg_rating ?? 0), 1) }} / 5
                </div>
                <div class="text-sm text-gray-500">({{ $center->ratings_count ?? 0 }}) تقييم</div>
            </div>
        </div>
    </div>

    {{-- Courses Summary --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">ملخص تقييمات الدورات</h3>

        @if($courses->isEmpty())
            <p class="text-sm text-gray-500">لا توجد دورات لهذا المركز.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-right text-gray-500 border-b">
                            <th class="py-2">الدورة</th>
                            <th class="py-2">المتوسط</th>
                            <th class="py-2">عدد التقييمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                            <tr class="border-b last:border-0">
                                <td class="py-3 font-semibold">{{ $course->title }}</td>
                                <td class="py-3">{{ number_format((float)($course->ratings_avg_rating ?? 0), 1) }} / 5</td>
                                <td class="py-3">{{ $course->ratings_count ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Tutors Summary --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">ملخص تقييمات المدربين</h3>

        @if($tutors->isEmpty())
            <p class="text-sm text-gray-500">لا يوجد مدربون لهذا المركز.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-right text-gray-500 border-b">
                            <th class="py-2">المدرب</th>
                            <th class="py-2">المتوسط</th>
                            <th class="py-2">عدد التقييمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutors as $tutor)
                            <tr class="border-b last:border-0">
                                <td class="py-3 font-semibold">{{ $tutor->name }}</td>
                                <td class="py-3">{{ number_format((float)($tutor->ratings_avg_rating ?? 0), 1) }} / 5</td>
                                <td class="py-3">{{ $tutor->ratings_count ?? 0 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    {{-- Center Ratings List --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">تقييمات المركز</h3>

        @if($centerRatings->isEmpty())
            <p class="text-sm text-gray-500">لا توجد تقييمات للمركز حتى الآن.</p>
        @else
            <div class="space-y-3">
                @foreach($centerRatings as $rating)
                    <div class="border border-gray-100 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div class="font-semibold">{{ $rating->user->name ?? 'طالب' }}</div>
                            <div class="font-extrabold text-[#003366]">{{ $rating->rating }} / 5</div>
                        </div>
                        @if($rating->comment)
                            <div class="text-sm text-gray-600 mt-2">{{ $rating->comment }}</div>
                        @endif
                        <div class="text-xs text-gray-400 mt-2">{{ $rating->created_at?->format('Y-m-d H:i') }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Course Ratings List --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">تقييمات الدورات</h3>

        @if($courseRatings->isEmpty())
            <p class="text-sm text-gray-500">لا توجد تقييمات للدورات حتى الآن.</p>
        @else
            <div class="space-y-3">
                @foreach($courseRatings as $rating)
                    <div class="border border-gray-100 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div class="font-semibold">
                                {{ $rating->user->name ?? 'طالب' }}
                                <span class="text-gray-400">—</span>
                                <span class="text-gray-700">{{ $courseTitleById[$rating->rateable_id] ?? 'دورة' }}</span>
                            </div>
                            <div class="font-extrabold text-[#003366]">{{ $rating->rating }} / 5</div>
                        </div>
                        @if($rating->comment)
                            <div class="text-sm text-gray-600 mt-2">{{ $rating->comment }}</div>
                        @endif
                        <div class="text-xs text-gray-400 mt-2">{{ $rating->created_at?->format('Y-m-d H:i') }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- Tutor Ratings List --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">تقييمات المدربين</h3>

        @if($tutorRatings->isEmpty())
            <p class="text-sm text-gray-500">لا توجد تقييمات للمدربين حتى الآن.</p>
        @else
            <div class="space-y-3">
                @foreach($tutorRatings as $rating)
                    <div class="border border-gray-100 rounded-xl p-4">
                        <div class="flex items-center justify-between">
                            <div class="font-semibold">
                                {{ $rating->user->name ?? 'طالب' }}
                                <span class="text-gray-400">—</span>
                                <span class="text-gray-700">{{ $tutorNameById[$rating->rateable_id] ?? 'مدرب' }}</span>
                            </div>
                            <div class="font-extrabold text-[#003366]">{{ $rating->rating }} / 5</div>
                        </div>
                        @if($rating->comment)
                            <div class="text-sm text-gray-600 mt-2">{{ $rating->comment }}</div>
                        @endif
                        <div class="text-xs text-gray-400 mt-2">{{ $rating->created_at?->format('Y-m-d H:i') }}</div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

@endsection
