@extends('layouts.auth')

@section('content')

@if(session('error'))
    <div class="mb-4 rounded-lg bg-red-100 px-4 py-2 text-sm text-red-700">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('login.attempt') }}" method="POST" autocomplete="off" class="flex flex-col gap-5 w-full">
    @csrf

    {{-- Email --}}
    <label class="flex flex-col w-full">
        <span class="text-[#0c141d] dark:text-slate-300 text-base font-medium pb-2">البريد الإلكتروني</span>
        <input type="email" name="email" value="{{ old('email') }}"
               class="form-input w-full border border-[#e0e0e0] dark:border-slate-700 rounded-lg p-3 text-slate-800 dark:text-slate-200 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50"
               placeholder="أدخل بريدك الإلكتروني" required>
    </label>

    {{-- Password --}}
    <label class="flex flex-col w-full">
        <span class="text-[#0c141d] dark:text-slate-300 text-base font-medium pb-2">كلمة المرور</span>
        <input type="password" name="password"
               class="form-input w-full border border-[#e0e0e0] dark:border-slate-700 rounded-lg p-3 text-slate-800 dark:text-slate-200 placeholder:text-slate-400 dark:placeholder:text-slate-500 focus:outline-none focus:ring-2 focus:ring-primary/50"
               placeholder="أدخل كلمة المرور" required>
    </label>

    {{-- Submit --}}
    <button type="submit"
            class="w-full bg-[#1E90FF] text-white py-3 rounded-lg text-lg font-semibold hover:bg-[#0077E6] transition">
        تسجيل الدخول
    </button>
</form>

@endsection
