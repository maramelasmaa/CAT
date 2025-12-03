@extends('layouts.manager')

@section('title', 'الدورات')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm">

    <table class="w-full text-right">
        <thead>
            <tr class="border-b">
                <th class="py-2">الصورة</th>
                <th>اسم الدورة</th>
                <th>المدرب</th>
                <th>المقاعد المتاحة</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $course)
                <tr class="border-b">

                    <td class="py-2">
                        @if($course->image)
                            <img src="{{ $course->image }}" class="w-12 h-12 rounded-lg object-cover">
                        @endif
                    </td>

                    <td>{{ $course->title }}</td>
                    <td>{{ $course->tutor->name }}</td>
                    <td>{{ $course->available_seats }}</td>

                    <td class="flex gap-2 py-2">

                        <a href="{{ route('manager.courses.details', $course) }}"
                           class="text-[#1E90FF]">عرض</a>

                        <a href="{{ route('manager.courses.edit', $course) }}"
                           class="text-green-600">تعديل</a>

                        <form action="{{ route('manager.courses.destroy', $course) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600">حذف</button>
                        </form>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
