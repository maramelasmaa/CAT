@extends('layouts.manager')

@section('title', 'تفاصيل الدورة')

@section('content')

<div class="max-w-xl rounded-2xl bg-white p-6 shadow-sm border border-gray-200">

    {{-- Course Image --}}
    @if($course->image)
        <img
            src="{{ asset('storage/' . $course->image) }}"
            alt="صورة الدورة"
            class="w-40 h-40 rounded-lg object-cover mb-5 mx-auto"
        >
    @endif

    {{-- Course Info --}}
    <div class="space-y-2 text-sm">

        <p>
            <span class="font-bold text-[#003366]">اسم الدورة:</span>
            {{ $course->title }}
        </p>

        <p>
            <span class="font-bold text-[#003366]">الوصف:</span>
            {{ $course->description ?? '—' }}
        </p>

        <p>
            <span class="font-bold text-[#003366]">السعة:</span>
            {{ $course->capacity }}
        </p>

        <p>
            <span class="font-bold text-[#003366]">المقاعد المتاحة:</span>
            {{ $course->available_seats }}
        </p>

        <p>
            <span class="font-bold text-[#003366]">الجدول:</span>
            {{ $course->schedule ?? '—' }}
        </p>

    </div>

    <hr class="my-5">

    {{-- Tutor Info --}}
    <h3 class="text-lg font-bold text-[#003366] mb-3">
        المدرب
    </h3>

    @if($course->tutor)
        <div class="flex items-center gap-4">

            @if($course->tutor->image)
                <img
                    src="{{ asset('storage/' . $course->tutor->image) }}"
                    alt="صورة المدرب"
                    class="w-20 h-20 rounded-full object-cover"
                >
            @endif

            <div class="text-sm space-y-1">
                <p>
                    <span class="font-bold">الاسم:</span>
                    {{ $course->tutor->name }}
                </p>
                <p>
                    <span class="font-bold">الهاتف:</span>
                    {{ $course->tutor->phone ?? '—' }}
                </p>
                <p>
                    <span class="font-bold">التخصص:</span>
                    {{ $course->tutor->specialization ?? '—' }}
                </p>
            </div>

        </div>
    @else
        <p class="text-gray-500 text-sm">
            لا يوجد مدرب مرتبط بهذه الدورة.
        </p>
    @endif

    {{-- Back Button --}}
    <div class="mt-6">
        <a
            href="{{ route('manager.courses.index') }}"
            class="inline-block bg-gray-200 hover:bg-gray-300 text-sm px-4 py-2 rounded-lg"
        >
            رجوع إلى الدورات
        </a>
    </div>

</div>

@endsection
