@extends('layouts.manager')

@section('title', 'طلبات التسجيل')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm">

    <h2 class="text-xl font-bold text-[#003366] mb-4">طلبات التسجيل</h2>

    <table class="w-full text-right">
        <thead>
            <tr class="border-b">
                <th class="py-2">الطالب</th>
                <th>الدورة</th>
                <th>الحالة</th>
                <th>عرض</th>
            </tr>
        </thead>

        <tbody>
            @foreach($enrollments as $e)
                <tr class="border-b">
                    <td class="py-2">{{ $e->student->name }}</td>
                    <td>{{ $e->course->title }}</td>
                    <td>{{ $e->status }}</td>
                    <td>
                        <a href="{{ route('manager.enrollments.details', $e) }}"
                           class="text-[#1E90FF]">عرض</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
