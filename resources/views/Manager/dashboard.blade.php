@extends('layouts.manager')

@section('title', 'لوحة التحكم')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">عدد الدورات</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $coursesCount }}</p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">عدد المدرسين</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $tutorsCount }}</p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">طلبات التسجيل المعلقة</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $pendingEnrollments }}</p>
    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">الدورات الأعلى تسجيلاً</h3>

        @if(isset($topCoursesByEnrollment) && $topCoursesByEnrollment->count())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الدورة</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">مقبولة</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">معلقة</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المقاعد المتاحة</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($topCoursesByEnrollment as $course)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $course->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $course->approved_enrollments_count ?? 0 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $course->pending_enrollments_count ?? 0 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">
                                    {{ $course->available_seats }} / {{ $course->capacity }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-600">لا توجد بيانات كافية بعد.</p>
        @endif
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">أحدث التعليقات السلبية</h3>

        @if(isset($latestNegativeFeedback) && $latestNegativeFeedback->count())
            <div class="space-y-3">
                @foreach($latestNegativeFeedback as $item)
                    <div class="rounded-xl border border-gray-200 p-4">
                        <div class="flex items-start justify-between gap-4">
                            <div class="text-sm text-gray-900">
                                <p class="font-medium">
                                    {{ optional($item->user)->name ?? 'طالب' }}
                                    <span class="text-gray-500">•</span>
                                    <span class="text-gray-700">
                                        @if($item->rateable_type === \App\Models\Course::class)
                                            دورة: {{ optional($item->rateable)->title }}
                                        @elseif($item->rateable_type === \App\Models\Tutor::class)
                                            مدرس: {{ optional($item->rateable)->name }}
                                        @elseif($item->rateable_type === \App\Models\Center::class)
                                            مركز: {{ optional($item->rateable)->name }}
                                        @else
                                            تقييم
                                        @endif
                                    </span>
                                </p>
                                <p class="text-sm text-gray-700 mt-1">{{ $item->comment }}</p>
                            </div>
                            <div class="text-sm font-bold text-[#003366] whitespace-nowrap">{{ $item->rating }}/5</div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-sm text-gray-600">لا توجد تعليقات سلبية حالياً.</p>
        @endif
    </div>

</div>

@endsection
