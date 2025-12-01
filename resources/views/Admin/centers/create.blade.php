@extends('layouts.admin')

@section('title', 'إضافة مركز جديد')

@section('content')

<div class="rounded-2xl border bg-white p-6 shadow-sm max-w-2xl">

    <form action="{{ route('centers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-4">

            <div>
                <label class="text-sm font-medium">اسم المركز</label>
                <input type="text" name="name" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">الموقع</label>
                <input type="text" name="location" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">رقم الهاتف</label>
                <input type="text" name="phone" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">رقم الحساب البنكي</label>
                <input type="text" name="bank_account" class="w-full rounded-lg border-gray-300" required>
            </div>

            <div>
                <label class="text-sm font-medium">الوصف</label>
                <textarea name="description" rows="4" class="w-full rounded-lg border-gray-300"></textarea>
            </div>

            <div>
                <label class="text-sm font-medium">صورة / شعار المركز</label>
                <input type="file" name="image" class="w-full rounded-lg border-gray-300">
            </div>

            <button class="w-full mt-4 bg-[#1E90FF] text-white py-2.5 rounded-lg hover:bg-[#0077E6]">
                حفظ المركز
            </button>

        </div>

    </form>
</div>

@endsection
