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

        {{-- Profile + Greeting --}}
        <div class="flex items-center gap-3 mb-6">
            <img src="{{ asset('images/cat-logo.png') }}" class="w-12 h-12 rounded-full">

            <p class="text-lg font-bold text-white">
                أهلاً {{ strtok(auth('manager')->user()->name, ' ') }}
            </p>
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

            {{-- Ratings --}}
            <a href="{{ route('manager.ratings.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.ratings.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">star</span>
                التقييمات
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

        {{-- Notifications --}}
        @if(session('success') || session('error'))
            <div id="appNotice" class="fixed top-4 left-4 z-50 max-w-sm w-[92%] sm:w-auto">
                <div class="rounded-xl px-4 py-3 shadow-lg border
                    {{ session('success') ? 'bg-green-600 border-green-700 text-white' : 'bg-red-600 border-red-700 text-white' }}">
                    <div class="flex items-start justify-between gap-3">
                        <div class="text-sm font-semibold leading-6">
                            {{ session('success') ?? session('error') }}
                        </div>
                        <button type="button" onclick="document.getElementById('appNotice')?.remove()" class="text-white/90 hover:text-white">×</button>
                    </div>
                </div>
            </div>
            <script>
                setTimeout(function () {
                    const el = document.getElementById('appNotice');
                    if (el) el.remove();
                }, 3500);
            </script>
        @endif

        {{-- Page Content --}}
        @yield('content')

    </main>

</div>

</body>
</html>
