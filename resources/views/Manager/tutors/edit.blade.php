@extends('layouts.manager')

@section('title', 'تعديل الدورة')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    <form action="{{ route('manager.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="font-medium text-sm">العنوان</label>
            <input type="text" name="title" value="{{ $course->title }}" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">الوصف</label>
            <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300">{{ $course->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">الجدول</label>
            <input type="text" name="schedule" value="{{ $course->schedule }}" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">السعة</label>
            <input type="number" name="capacity" value="{{ $course->capacity }}" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">المدرس</label>
            <select name="tutor_id" class="w-full rounded-lg border-gray-300">
                @foreach($tutors as $tutor)
                    <option value="{{ $tutor->id }}" @selected($tutor->id == $course->tutor_id)>
                        {{ $tutor->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">الصورة</label>
            <input type="file" name="image" class="w-full rounded-lg border-gray-300" onchange="previewImage(event)">
        </div>

        @if($course->image)
            <img src="{{ $course->image }}" class="w-28 h-28 rounded-lg object-cover mb-3">
        @endif

        <img id="preview" class="w-28 h-28 rounded-lg object-cover hidden">

        <button class="mt-4 w-full bg-[#1E90FF] text-white py-2 rounded-lg">
            تحديث
        </button>

    </form>

</div>

<script>
function previewImage(event) {
    const img = document.getElementById('preview');
    img.src = URL.createObjectURL(event.target.files[0]);
    img.classList.remove('hidden');
}
</script>

@endsection
