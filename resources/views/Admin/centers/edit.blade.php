@extends('layouts.admin')

@section('title', 'تعديل بيانات المركز')

@section('content')

<div class="rounded-2xl border bg-white p-6 shadow-sm max-w-2xl">

    <form action="{{ route('centers.update', $center) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="space-y-4">

            <div>
                <label class="text-sm font-medium">اسم المركز</label>
                <input type="text" name="name" value="{{ $center->name }}" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">الموقع</label>
                <input type="text" name="location" value="{{ $center->location }}" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">رقم الهاتف</label>
                <input type="text" name="phone" value="{{ $center->phone }}" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">رقم الحساب البنكي</label>
                <input type="text" name="bank_account" value="{{ $center->bank_account }}" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">الوصف</label>
                <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300">{{ $center->description }}</textarea>
            </div>

            <div>
                <label class="text-sm font-medium">الصورة الحالية</label>
                @if($center->image)
                    <img src="{{ $center->image_url }}" class="w-16 h-16 rounded-full object-cover mb-2">
                @else
                    <p class="text-gray-500 text-sm">لا توجد صورة</p>
                @endif

                <label class="text-sm font-medium">تغيير الصورة</label>
                <input type="file" name="image" class="w-full rounded-lg border-gray-300">
            </div>

            <button class="w-full mt-4 bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
                تحديث المركز
            </button>

        </div>

    </form>
</div>

@endsection
