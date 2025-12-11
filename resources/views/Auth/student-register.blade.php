@extends('layouts.auth')

@section('title', 'إنشاء حساب جديد - CAT')
@section('form-title', 'إنشاء حساب طالب جديد')

@section('content')

@if(session('error'))
<div class="mb-4 rounded-xl bg-red-50 dark:bg-red-950 px-4 py-3 text-sm text-red-700 dark:text-red-300 border border-red-300 dark:border-red-800 font-medium">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('student.register.store') }}" method="POST" class="flex flex-col gap-6 w-full">
    @csrf

    {{-- Name --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">الاسم الكامل</span>
        <input type="text" name="name" value="{{ old('name') }}" 
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150" 
               placeholder="أدخل اسمك" required>
    </label>

    {{-- Email --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">البريد الإلكتروني</span>
        <input type="email" name="email" value="{{ old('email') }}" 
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150" 
               placeholder="example@email.com" required>
    </label>

    {{-- Password --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">كلمة المرور</span>
        <input type="password" name="password" 
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150" 
               placeholder="••••••" required>
    </label>

    {{-- Confirm --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">تأكيد كلمة المرور</span>
        <input type="password" name="password_confirmation" 
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150" 
               placeholder="••••••" required>
    </label>

    <button type="submit" 
            class="w-full bg-brand-blue text-white py-3 rounded-lg text-lg font-bold shadow-md hover:bg-brand-darker-blue focus:ring-4 focus:ring-brand-blue/50 transition duration-200 mt-2">
        إنشاء حساب جديد
    </button>

    <div class="text-center mt-3">
        <a href="{{ route('login.form') }}" class="text-brand-blue hover:text-brand-darker-blue dark:text-brand-blue dark:hover:text-brand-darker-blue font-medium transition">
            لديك حساب بالفعل؟ تسجيل الدخول
        </a>
    </div>
</form>

@endsection