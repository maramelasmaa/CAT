@extends('layouts.manager')

@section('title', 'إضافة دورة جديدة')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-2xl">

    <form action="{{ route('manager.courses.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="font-medium">اسم الدورة</label>
            <input type="text" name="title" class="w-full rounded-lg border-gray-300" required>
        </div>

        <div>
            <label class="font-medium">الوصف</label>
            <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300"></textarea>
        </div>

        <div>
            <label class="font-medium">الجدول</label>
            <input type="text" name="schedule" class="w-full rounded-lg border-gray-300">
        </div>

        <div>
            <label class="font-medium">السعة</label>
            <input type="number" name="capacity" class="w-full rounded-lg border-gray-300" required>
        </div>

        <div>
            <label class="font-medium">المدرب</label>
            <select name="tutor_id" class="w-full rounded-lg border-gray-300" required>
                <option value="">اختر المدرب</option>
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}">{{ $tutor->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="font-medium">الصورة (اختياري)</label>
            <input type="file" name="image" class="w-full rounded-lg border-gray-300">
        </div>

        <button class="w-full bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
            إضافة الدورة
        </button>

    </form>

</div>

@endsection
