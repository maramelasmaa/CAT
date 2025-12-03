@extends('layouts.manager')

@section('title', 'تفاصيل التسجيل')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    <p class="mb-2"><span class="font-bold">الطالب:</span> {{ $enrollment->student->name }}</p>
    <p class="mb-2"><span class="font-bold">الدورة:</span> {{ $enrollment->course->title }}</p>
    <p class="mb-2"><span class="font-bold">الحالة:</span> {{ $enrollment->status }}</p>

    @if($enrollment->payment_pdf)
        <a href="{{ $enrollment->payment_pdf }}" target="_blank"
           class="text-[#1E90FF] underline">
            عرض إثبات الدفع
        </a>
    @endif

    <div class="flex gap-4 mt-4">

        <form method="POST" action="{{ route('manager.enrollments.approve', $enrollment) }}">
            @csrf
            <button class="bg-green-600 text-white px-4 py-2 rounded-lg">قبول</button>
        </form>

        <form method="POST" action="{{ route('manager.enrollments.decline', $enrollment) }}">
            @csrf
            <button class="bg-red-600 text-white px-4 py-2 rounded-lg">رفض</button>
        </form>

    </div>

</div>

@endsection
