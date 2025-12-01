@extends('layouts.admin')

@section('title', 'إضافة مدير مركز')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm max-w-xl">

    <form action="{{ route('admin.managers.store') }}" method="POST">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">الاسم</label>
            <input type="text" name="name" class="w-full rounded-lg border-gray-300" required>
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">البريد الإلكتروني</label>
            <input type="email" name="email" class="w-full rounded-lg border-gray-300" required>
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">كلمة المرور</label>
            <input type="password" name="password" class="w-full rounded-lg border-gray-300" required>
        </div>

        {{-- Center Dropdown --}}
        <div class="mb-4">
            <label class="block mb-1 font-medium text-sm">المركز</label>
            <select name="center_id" class="w-full rounded-lg border-gray-300" required>
                <option disabled selected>اختر مركزاً</option>
                @foreach ($centers as $center)
                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
                class="mt-3 w-full rounded-lg bg-[#1E90FF] py-2.5 text-white font-medium hover:bg-[#0077E6]">
            إضافة مدير المركز
        </button>

    </form>

</div>

@endsection
