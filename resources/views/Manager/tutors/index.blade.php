@extends('layouts.manager')

@section('title', 'المدربون')

@section('content')

<div class="bg-white rounded-2xl shadow-sm p-6">

    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-bold text-[#003366]">قائمة المدربين</h2>

        <a href="{{ route('manager.tutors.create') }}"
           class="bg-[#1E90FF] text-white px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-[#0077E6]">
            <span class="material-symbols-outlined">add</span>
            إضافة مدرب جديد
        </a>
    </div>

    <table class="w-full text-right">
        <thead>
            <tr class="border-b text-sm text-gray-600">
                <th class="py-2">الصورة</th>
                <th>الاسم</th>
                <th>رقم الهاتف</th>
                <th>التخصص</th>
                <th>العمليات</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tutors as $tutor)
                <tr class="border-b text-sm">

                    {{-- Image --}}
                    <td class="py-2">
                        @if($tutor->image)
                            <img src="{{ asset('storage/' . $tutor->image) }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            —
                        @endif
                    </td>

                    {{-- Name --}}
                    <td>{{ $tutor->name }}</td>

                    {{-- Phone --}}
                    <td>{{ $tutor->phone }}</td>

                    {{-- Specialization --}}
                    <td>{{ $tutor->specialization }}</td>

                    {{-- Actions --}}
                    <td class="flex gap-3 py-2">

                        <a href="{{ route('manager.tutors.details', $tutor) }}" class="text-blue-600">
                            <span class="material-symbols-outlined">visibility</span>
                        </a>

                        <a href="{{ route('manager.tutors.edit', $tutor) }}" class="text-green-600">
                            <span class="material-symbols-outlined">edit</span>
                        </a>

                        <form action="{{ route('manager.tutors.destroy', $tutor) }}" method="POST">
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
