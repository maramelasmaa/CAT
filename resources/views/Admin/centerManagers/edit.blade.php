@extends('layouts.admin')

@section('title', 'تعديل مدير مركز')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm max-w-xl">

    <form action="{{ route('admin.managers.update', $manager) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">الاسم</label>
            <input type="text" name="name" value="{{ $manager->name }}" class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">البريد الإلكتروني</label>
            <input type="email" name="email" value="{{ $manager->email }}" class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Password (optional) --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">كلمة المرور الجديدة (اختياري)</label>
            <input type="password" name="password" class="w-full rounded-lg border-gray-300">
        </div>

        {{-- Center Dropdown --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">المركز</label>
            <select name="center_id" class="w-full rounded-lg border-gray-300">
                @foreach ($centers as $center)
                    <option value="{{ $center->id }}" {{ $manager->center_id == $center->id ? 'selected' : '' }}>
                        {{ $center->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit"
                class="mt-3 w-full rounded-lg bg-[#1E90FF] py-2.5 text-white font-medium hover:bg-[#0077E6]">
            تحديث البيانات
        </button>

    </form>

</div>

@endsection
