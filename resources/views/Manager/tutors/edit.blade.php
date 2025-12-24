@extends('layouts.manager')

@section('title', 'تعديل بيانات المدرب')

@section('content')

<div class="bg-white p-6 rounded-2xl shadow-sm max-w-xl">

    <form action="{{ route('manager.tutors.update', $tutor->id) }}" method="POST" enctype="multipart/form-data"
          class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Current Image --}}
        @if($tutor->image)
            <img src="{{ $tutor->image_url }}" class="w-32 h-32 rounded-full object-cover mb-4">
        @endif

        <div>
            <label class="font-medium">اسم المدرب</label>
            <input type="text" name="name" class="w-full rounded-lg border-gray-300"
                   value="{{ $tutor->name }}" required>
        </div>

        <div>
            <label class="font-medium">رقم الهاتف</label>
            <input type="text" name="phone" class="w-full rounded-lg border-gray-300"
                   value="{{ $tutor->phone }}">
        </div>

        <div>
            <label class="font-medium">التخصص</label>
            <input type="text" name="specialization" class="w-full rounded-lg border-gray-300"
                   value="{{ $tutor->specialization }}">
        </div>

        <div>
            <label class="font-medium">الصورة (اختياري)</label>
            <input type="file" name="image" class="w-full rounded-lg border-gray-300">
        </div>

        <button class="w-full bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
            تحديث البيانات
        </button>

    </form>

</div>

@endsection
