@extends('layouts.auth')

@section('content')

@if(session('error'))
<div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-sm text-red-700">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('student.register.store') }}" method="POST" class="flex flex-col gap-5 w-full">
    @csrf

    {{-- Name --}}
    <label class="flex flex-col w-full">
        <span class="text-base font-medium pb-2">الاسم الكامل</span>
        <input type="text" name="name" value="{{ old('name') }}" class="form-input p-3 rounded-lg border" placeholder="أدخل اسمك" required>
    </label>

    {{-- Email --}}
    <label class="flex flex-col w-full">
        <span class="text-base font-medium pb-2">البريد الإلكتروني</span>
        <input type="email" name="email" value="{{ old('email') }}" class="form-input p-3 rounded-lg border" placeholder="example@email.com" required>
    </label>

    {{-- Password --}}
    <label class="flex flex-col w-full">
        <span class="text-base font-medium pb-2">كلمة المرور</span>
        <input type="password" name="password" class="form-input p-3 rounded-lg border" placeholder="••••••" required>
    </label>

    {{-- Confirm --}}
    <label class="flex flex-col w-full">
        <span class="text-base font-medium pb-2">تأكيد كلمة المرور</span>
        <input type="password" name="password_confirmation" class="form-input p-3 rounded-lg border" placeholder="••••••" required>
    </label>

    <button type="submit" class="w-full bg-[#1E90FF] text-white py-3 rounded-lg text-lg font-semibold">
        إنشاء حساب جديد
    </button>

    <div class="text-center mt-3">
        <a href="{{ route('student.login') }}" class="text-blue-600 hover:underline">
            لديك حساب؟ تسجيل الدخول
        </a>
    </div>
</form>

@endsection
