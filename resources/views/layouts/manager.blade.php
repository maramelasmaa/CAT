<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة مدير المركز')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>

<body class="bg-[#f4f6fa] text-slate-800">

<div class="relative flex min-h-screen w-full">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-[#003366] text-white flex flex-col p-5">

        {{-- Logo --}}
        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('images/cat-logo.png') }}" class="w-12 h-12 rounded-full">
            <h1 class="font-bold text-lg">مدير المركز</h1>
        </div>

        {{-- Menu --}}
        <nav class="flex flex-col gap-2 flex-1">

            {{-- Dashboard --}}
            <a href="{{ route('manager.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.dashboard') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">dashboard</span>
                لوحة التحكم
            </a>

            {{-- Tutors --}}
            <a href="{{ route('manager.tutors.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.tutors.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">group</span>
                المدربون
            </a>

            {{-- Courses --}}
            <a href="{{ route('manager.courses.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.courses.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">library_books</span>
                الدورات
            </a>

            {{-- Enrollments --}}
            <a href="{{ route('manager.enrollments.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.enrollments.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">fact_check</span>
                طلبات التسجيل
            </a>

        </nav>

        {{-- Logout --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button class="w-full text-right flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF]/70">
                <span class="material-symbols-outlined">logout</span>
                تسجيل الخروج
            </button>
        </form>

    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-8">

        {{-- Page Title --}}
        <h1 class="text-3xl font-extrabold text-[#003366] mb-6">
            @yield('title')
        </h1>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Page Content --}}
        @yield('content')

    </main>

</div>

</body>
</html>
