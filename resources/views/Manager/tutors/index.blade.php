@extends('layouts.manager')

@section('title', 'المدربون')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm">

    <table class="w-full text-right">
        <thead>
            <tr class="border-b">
                <th class="py-2">الصورة</th>
                <th>الاسم</th>
                <th>التخصص</th>
                <th>رقم الهاتف</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tutors as $tutor)
                <tr class="border-b">

                    <td class="py-2">
                        @if($tutor->image)
                            <img src="{{ $tutor->image }}" class="w-12 h-12 rounded-lg object-cover">
                        @endif
                    </td>

                    <td>{{ $tutor->name }}</td>
                    <td>{{ $tutor->specialization ?? '—' }}</td>
                    <td>{{ $tutor->phone ?? '—' }}</td>

                    <td class="flex gap-2 py-2">

                        <a href="{{ route('manager.tutors.details', $tutor) }}"
                           class="text-[#1E90FF]">عرض</a>

                        <a href="{{ route('manager.tutors.edit', $tutor) }}"
                           class="text-green-600">تعديل</a>

                        <form action="{{ route('manager.tutors.destroy', $tutor) }}" method="POST">
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
