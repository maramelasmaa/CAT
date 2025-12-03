@extends('layouts.manager')

@section('title', 'إضافة مدرس')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    <form action="{{ route('manager.tutors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="font-medium text-sm">الاسم</label>
            <input type="text" name="name" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">الهاتف</label>
            <input type="text" name="phone" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">التخصص</label>
            <input type="text" name="specialization" class="w-full rounded-lg border-gray-300">
        </div>

        <div class="mb-4">
            <label class="font-medium text-sm">الصورة</label>
            <input type="file" name="image" class="w-full rounded-lg border-gray-300" onchange="previewImage(event)">
        </div>

        <img id="preview" class="w-28 h-28 rounded-lg object-cover hidden">

        <button class="mt-4 w-full bg-[#1E90FF] text-white py-2 rounded-lg">
            حفظ
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
