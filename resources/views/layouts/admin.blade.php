<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f4f6fa;
        }
    </style>
</head>

<body class="bg-[#f4f6fa]">

<div class="flex min-h-screen">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="w-64 bg-[#003366] text-white flex flex-col">

        <div class="p-6 flex flex-col gap-6">

            {{-- Logo --}}
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/cat-logo.png') }}"
                     alt="CAT Logo"
                     class="w-12 h-12 rounded-full object-cover">
                <h1 class="text-white text-xl font-bold">CAT System</h1>
            </div>

            {{-- Navigation --}}
            <nav class="flex flex-col gap-2">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF] transition
                     {{ request()->routeIs('admin.dashboard') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">home</span>
                    <span class="text-sm font-medium">لوحة التحكم</span>
                </a>

                {{-- Centers --}}
                <a href="{{ route('centers.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF] transition
                     {{ request()->routeIs('centers.*') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">domain</span>
                    <span class="text-sm font-medium">المراكز</span>
                </a>

                {{-- Center Managers --}}
                <a href="{{ route('centerManagers.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF] transition
                     {{ request()->routeIs('centerManagers.*') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-medium">مديرو المراكز</span>
                </a>

            </nav>

        </div>

        {{-- Logout (you can later attach actual route) --}}
        <div class="mt-auto p-6">
            <a href="#"
               class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF] transition">
                <span class="material-symbols-outlined">logout</span>
                <span class="text-sm font-medium">تسجيل الخروج</span>
            </a>
        </div>

    </aside>


    {{-- ================= MAIN CONTENT ================= --}}
    <main class="flex-1 p-6">

        {{-- Page Title --}}
        <h1 class="text-3xl font-bold text-[#003366] mb-6">
            @yield('title')
        </h1>

        {{-- Body Content --}}
        @yield('content')

    </main>

</div>

</body>
</html>
