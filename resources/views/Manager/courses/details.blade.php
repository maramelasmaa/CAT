@extends('layouts.manager')

@section('title', 'تفاصيل الدورة')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    {{-- Image --}}
    @if($course->image)
        <img src="{{ $course->image }}" class="w-32 h-32 rounded-lg object-cover mb-4">
    @endif

    <p class="mb-2"><span class="font-bold">اسم الدورة:</span> {{ $course->title }}</p>
    <p class="mb-2"><span class="font-bold">الوصف:</span> {{ $course->description ?? '—' }}</p>
    <p class="mb-2"><span class="font-bold">السعة:</span> {{ $course->capacity }}</p>
    <p class="mb-2"><span class="font-bold">المقاعد المتاحة:</span> {{ $course->available_seats }}</p>
    <p class="mb-2"><span class="font-bold">الجدول:</span> {{ $course->schedule ?? '—' }}</p>

    <hr class="my-4">

    {{-- Tutor Info --}}
    <h3 class="font-bold text-lg mb-3 text-[#003366]">المدرب</h3>

    @if($course->tutor)
        @if($course->tutor->image)
            <img src="{{ $course->tutor->image }}" class="w-20 h-20 rounded-full object-cover mb-3">
        @endif

        <p class="mb-2"><span class="font-bold">الاسم:</span> {{ $course->tutor->name }}</p>
        <p class="mb-2"><span class="font-bold">الهاتف:</span> {{ $course->tutor->phone }}</p>
        <p class="mb-2"><span class="font-bold">التخصص:</span> {{ $course->tutor->specialization }}</p>
    @else
        <p class="text-gray-500">لا يوجد مدرب مرتبط بهذه الدورة.</p>
    @endif

</div>

@endsection
