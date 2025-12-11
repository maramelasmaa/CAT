<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>

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

        {{-- Profile + Greeting --}}
        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('images/cat-logo.png') }}" class="w-12 h-12 rounded-full">

            <p class="text-lg font-bold text-white">
                أهلاً {{ strtok(optional(auth('admin')->user())->name ?? 'المسؤول', ' ') }}
            </p>
        </div>

        {{-- Menu --}}
        <nav class="flex flex-col gap-2 flex-1">

            {{-- Dashboard --}}
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('admin.dashboard') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">home</span>
                لوحة التحكم
            </a>

            {{-- Centers --}}
            <a href="{{ route('centers.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('centers.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">domain</span>
                المراكز
            </a>

            {{-- Center Managers --}}
            <a href="{{ route('centerManagers.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('centerManagers.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">group</span>
                مديرو المراكز
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

    {{-- MAIN CONTENT --}}
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
