@extends('layouts.manager')

@section('title', 'إضافة مدرب جديد')

@section('content')

<div class="bg-white p-6 rounded-2xl shadow-sm max-w-xl">

    <form action="{{ route('manager.tutors.store') }}" method="POST" enctype="multipart/form-data"
          class="space-y-4">
        @csrf

        <div>
            <label class="font-medium">اسم المدرب</label>
            <input type="text" name="name" required
                   class="w-full rounded-lg border-gray-300 mt-1">
        </div>

        <div>
            <label class="font-medium">رقم الهاتف</label>
            <input type="text" name="phone"
                   class="w-full rounded-lg border-gray-300 mt-1">
        </div>

        <div>
            <label class="font-medium">التخصص</label>
            <input type="text" name="specialization"
                   class="w-full rounded-lg border-gray-300 mt-1">
        </div>

        <div>
            <label class="font-medium">الصورة (اختياري)</label>
            <input type="file" name="image"
                   class="w-full rounded-lg border-gray-300 mt-1">
        </div>

        <button class="w-full bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
            إضافة المدرب
        </button>

    </form>

</div>

@endsection
