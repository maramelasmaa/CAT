@extends('layouts.manager')

@section('title', 'تفاصيل التسجيل')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    <p class="mb-2"><span class="font-bold">الطالب:</span> {{ $enrollment->user->name }}</p>
    <p class="mb-2"><span class="font-bold">الدورة:</span> {{ $enrollment->course->title }}</p>
    <p class="mb-2"><span class="font-bold">الحالة:</span> {{ $enrollment->status }}</p>
    <p class="mb-2"><span class="font-bold">طريقة الدفع:</span>
        {{ $enrollment->payment_type === 'bank' ? 'تحويل بنكي' : 'الدفع في المركز' }}
    </p>

    @if($enrollment->payment_proof)
        <a href="{{ asset('storage/'.$enrollment->payment_proof) }}" target="_blank">
            View PDF
        </a>
    @else
        —
    @endif

    <div class="flex gap-4 mt-6">

        @if($enrollment->status === 'pending')
            <form method="POST" action="{{ route('manager.enrollments.approve', $enrollment) }}">
                @csrf
                <button class="bg-green-600 text-white px-4 py-2 rounded-lg">قبول</button>
            </form>

            <form method="POST" action="{{ route('manager.enrollments.decline', $enrollment) }}">
                @csrf
                <button class="bg-red-600 text-white px-4 py-2 rounded-lg">رفض</button>
            </form>
        @else
            <p class="text-gray-500">تم اتخاذ إجراء بالفعل على هذا الطلب.</p>
        @endif

    </div>

</div>

@endsection
