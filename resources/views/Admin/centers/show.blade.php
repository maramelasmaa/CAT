@extends('layouts.admin')

@section('title', 'تفاصيل المركز')

@section('content')

<div class="space-y-6">

    {{-- Main Card --}}
    <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <div class="flex gap-6 items-start">

            <div>
                @if($center->image)
                    <img src="{{ asset('storage/'.$center->image) }}"
                         class="w-24 h-24 rounded-full object-cover">
                @else
                    <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center">
                        <span class="material-symbols-outlined text-gray-500 text-3xl">domain</span>
                    </div>
                @endif
            </div>

            <div class="space-y-1 flex-1">
                <h2 class="text-2xl font-bold text-[#003366]">{{ $center->name }}</h2>

                <p class="text-sm"><strong>الموقع:</strong> {{ $center->location }}</p>
                <p class="text-sm"><strong>الهاتف:</strong> {{ $center->phone }}</p>
                <p class="text-sm"><strong>الحساب البنكي:</strong> {{ $center->bank_account }}</p>

                @if($center->description)
                    <p class="text-sm text-gray-700 mt-2 leading-relaxed">
                        {{ $center->description }}
                    </p>
                @endif
            </div>

        </div>
    </div>

    {{-- Tutors --}}
    <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">المدرسون</h3>

        @if($center->tutors->count())
            <table class="w-full text-sm text-right">
                <thead class="border-b text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2">الاسم</th>
                        <th class="px-4 py-2">البريد</th>
                        <th class="px-4 py-2">الهاتف</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($center->tutors as $tutor)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $tutor->name }}</td>
                        <td class="px-4 py-2">{{ $tutor->email ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $tutor->phone ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-gray-500">لا يوجد مدرسون في هذا المركز.</p>
        @endif
    </div>

    {{-- Courses --}}
    <div class="rounded-2xl border bg-white p-6 shadow-sm">
        <h3 class="text-lg font-bold text-[#003366] mb-4">الدورات</h3>

        @if($center->courses->count())
            <table class="w-full text-sm text-right">
                <thead class="border-b text-gray-500 text-xs uppercase">
                    <tr>
                        <th class="px-4 py-2">اسم الدورة</th>
                        <th class="px-4 py-2">المدرس</th>
                        <th class="px-4 py-2">المدة</th>
                        <th class="px-4 py-2">السعر</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($center->courses as $course)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $course->title ?? $course->name ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $course->tutor->name ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $course->schedule ?? $course->duration ?? '—' }}</td>
                        <td class="px-4 py-2">{{ $course->price ?? '—' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-sm text-gray-500">لا توجد دورات في هذا المركز.</p>
        @endif
    </div>

</div>

@endsection
