@extends('layouts.manager')

@section('title', 'تفاصيل الدورة')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    @if($course->image)
        <img src="{{ $course->image }}" class="w-32 h-32 rounded-lg object-cover mb-4">
    @endif

    <p class="mb-2"><span class="font-bold">العنوان:</span> {{ $course->title }}</p>
    <p class="mb-2"><span class="font-bold">الوصف:</span> {{ $course->description }}</p>
    <p class="mb-2"><span class="font-bold">المدرس:</span> {{ $course->tutor->name }}</p>
    <p class="mb-2"><span class="font-bold">السعة:</span> {{ $course->capacity }}</p>
    <p class="mb-2"><span class="font-bold">المقاعد المتاحة:</span> {{ $course->available_seats }}</p>
    <p class="mb-2"><span class="font-bold">الجدول:</span> {{ $course->schedule }}</p>

</div>

@endsection
