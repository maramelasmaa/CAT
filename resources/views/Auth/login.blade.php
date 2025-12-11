@extends('layouts.auth')

@section('title', 'تسجيل الدخول - CAT')
@section('form-title', 'تسجيل الدخول إلى حسابك')

@section('content')

@if(session('error'))
    <div class="mb-4 rounded-xl bg-red-50 dark:bg-red-950 px-4 py-3 text-sm text-red-700 dark:text-red-300 border border-red-300 dark:border-red-800 font-medium">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('login.attempt') }}" method="POST" autocomplete="off" class="flex flex-col gap-6 w-full">
    @csrf

    {{-- Email --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">البريد الإلكتروني</span>
        <input type="email" name="email" value="{{ old('email') }}"
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150"
               placeholder="أدخل بريدك الإلكتروني" required>
    </label>

    {{-- Password --}}
    <label class="flex flex-col w-full">
        <span class="text-gray-700 dark:text-slate-200 text-base font-semibold pb-2">كلمة المرور</span>
        <input type="password" name="password"
               class="form-input w-full border border-gray-300 dark:border-slate-600 rounded-lg p-3 text-slate-800 dark:text-slate-50 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-brand-blue focus:border-brand-blue/50 dark:bg-slate-700 transition duration-150"
               placeholder="••••••" required>
    </label>

    {{-- Submit --}}
    <button type="submit"
            class="w-full bg-brand-blue text-white py-3 rounded-lg text-lg font-bold shadow-md hover:bg-brand-darker-blue focus:ring-4 focus:ring-brand-blue/50 transition duration-200 mt-2">
        تسجيل الدخول
    </button>
    
    <div class="text-center mt-3">
        <a href="{{ route('student.register') }}" class="text-brand-blue hover:text-brand-darker-blue dark:text-brand-blue dark:hover:text-brand-darker-blue font-medium transition">
            ليس لديك حساب؟ إنشاء حساب جديد
        </a>
    </div>
</form>

@endsection