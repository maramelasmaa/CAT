@extends('layouts.manager')

@section('title', 'الدورات')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-[#003366]">قائمة الدورات</h2>

        <a href="{{ route('manager.courses.create') }}"
           class="bg-[#1E90FF] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#0077E6]">
            <span class="material-symbols-outlined">add</span>
            إضافة دورة جديدة
        </a>
    </div>

    <table class="w-full text-right">
        <thead>
            <tr class="border-b text-sm text-gray-600">
                <th class="py-2">الصورة</th>
                <th>اسم الدورة</th>
                <th>المدرب</th>
                <th>المقاعد المتاحة</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
                <tr class="border-b text-sm">

                    {{-- Image --}}
                    <td class="py-2">
                        @if($course->image)
                            <img src="{{ $course->image }}" class="w-12 h-12 rounded-lg object-cover">
                        @else
                            —
                        @endif
                    </td>

                    {{-- Title --}}
                    <td>{{ $course->title }}</td>

                    {{-- Tutor --}}
                    <td>{{ $course->tutor->name }}</td>

                    {{-- Seats --}}
                    <td>{{ $course->available_seats }}</td>

                    {{-- Actions --}}
                    <td class="flex gap-3 py-2">

                        <a href="{{ route('manager.courses.details', $course) }}" class="text-blue-600">
                            <span class="material-symbols-outlined">visibility</span>
                        </a>

                        <a href="{{ route('manager.courses.edit', $course) }}" class="text-green-600">
                            <span class="material-symbols-outlined">edit</span>
                        </a>

                        <form action="{{ route('manager.courses.destroy', $course) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
