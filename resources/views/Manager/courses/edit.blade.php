@extends('layouts.manager')

@section('title', 'تعديل الدورة')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-2xl">

    <form action="{{ route('manager.courses.update', $course->id) }}" 
          method="POST" enctype="multipart/form-data"
          class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="font-medium">اسم الدورة</label>
            <input type="text" name="title" value="{{ $course->title }}"
                   class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Description --}}
        <div>
            <label class="font-medium">الوصف</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-lg border-gray-300">{{ $course->description }}</textarea>
        </div>

        {{-- Schedule --}}
        <div>
            <label class="font-medium">الجدول</label>
            <input type="text" name="schedule" value="{{ $course->schedule }}"
                   class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Capacity --}}
        <div>
            <label class="font-medium">السعة</label>
            <input type="number" name="capacity" value="{{ $course->capacity }}"
                   class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Tutor Dropdown --}}
        <div>
            <label class="font-medium">المدرب</label>
            <select name="tutor_id" class="w-full rounded-lg border-gray-300">
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}" 
                        {{ $course->tutor_id == $tutor->id ? 'selected' : '' }}>
                        {{ $tutor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Image --}}
        <div>
            <label class="font-medium">الصورة (اختياري)</label>
            <input type="file" name="image" class="w-full rounded-lg border-gray-300">
        </div>

        @if($course->image)
            <img src="{{ $course->image }}" class="w-28 h-28 rounded-lg object-cover mb-3">
        @endif

        <button class="w-full bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
            تحديث الدورة
        </button>

    </form>
</div>

@endsection
