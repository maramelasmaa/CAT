<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAT System - Admin</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #F5F6FA;
        }
    </style>

</head>

<body class="bg-[#F5F6FA]">

<div class="flex h-screen w-full">

    {{-- ================= SIDEBAR ================= --}}
    <aside class="flex h-full w-64 flex-col bg-[#003366] text-white">

        <div class="flex flex-col gap-4 p-4">

            {{-- Logo --}}
            <div class="flex items-center gap-3 p-2">
                <img src="{{ asset('images/cat-logo.png') }}" alt="CAT Logo" class="w-10 h-10 rounded-full object-cover">

                <h1 class="text-white text-lg font-bold leading-normal">CAT System</h1>
            </div>

            {{-- Navigation --}}
            <nav class="flex flex-col gap-2 mt-4">

                {{-- Dashboard --}}
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 rounded-lg 
                          {{ request()->routeIs('admin.dashboard') ? 'bg-[#1E90FF]' : '' }}
                          px-3 py-2 text-white transition-colors hover:bg-[#0077E6]">
                    <span class="material-symbols-outlined text-white">home</span>
                    <p class="text-sm font-medium leading-normal">لوحة التحكم</p>
                </a>

                {{-- Center Managers --}}
                <a href="{{ route('admin.managers.index') }}"
                   class="flex items-center gap-3 rounded-lg 
                          {{ request()->routeIs('admin.managers.*') ? 'bg-[#1E90FF]' : '' }}
                          px-3 py-2 text-white transition-colors hover:bg-[#0077E6]">
                    <span class="material-symbols-outlined text-white">supervisor_account</span>
                    <p class="text-sm font-medium leading-normal">مديرو المراكز</p>
                </a>

                {{-- Students --}}
                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-colors hover:bg-[#0077E6]">
                    <span class="material-symbols-outlined text-white">school</span>
                    <p class="text-sm font-medium leading-normal">الطلبة</p>
                </a>

                {{-- Courses --}}
                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-colors hover:bg-[#0077E6]">
                    <span class="material-symbols-outlined text-white">book</span>
                    <p class="text-sm font-medium leading-normal">الكورسات</p>
                </a>

                {{-- Settings --}}
                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2 text-white transition-colors hover:bg-[#0077E6]">
                    <span class="material-symbols-outlined text-white">settings</span>
                    <p class="text-sm font-medium leading-normal">الإعدادات</p>
                </a>

            </nav>
        </div>

        {{-- Logout removed: no `admin.logout` route implemented --}}

    </aside>



    {{-- ================= MAIN CONTENT ================= --}}
    <div class="flex flex-1 flex-col overflow-y-auto">

        {{-- Header --}}
        <header class="sticky top-0 z-10 flex h-[70px] shrink-0 items-center justify-between 
                       border-b border-gray-200 bg-white px-6 shadow-sm">

            <h1 class="text-[#003366] text-2xl font-bold leading-tight">
                @yield('title')
            </h1>

            <div class="flex items-center gap-4">

                {{-- Notifications --}}
                <button class="relative rounded-full p-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <span class="material-symbols-outlined">notifications</span>
                    <span class="absolute right-1 top-1 h-2 w-2 rounded-full bg-red-500"></span>
                </button>

                {{-- User Avatar --}}
                <div class="flex items-center gap-3">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                         style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB8nItJ1piA0J9uZ6sDHlr8ccl-hc_v44wIyKFdzbdwdoWHUT2gVfcvA6ZtwB_JIyIV2fAmDgfzGe9J4-bPwcw6k_BquhkVi8R-JsQwdDsfx77YSqfwJo6OMQgj1hvX0PkXsR9Q_d819bYX82MBIolBQyjmiGg7TjXeHb7ZkHF7tmeXbBMJ7xPyhrQHfGk2RdB43pSgFSkpc0aJik9Eh0grUwb85O0poaE_6eYxrZLHDXqV8XVHeYX12sVPBXiS6rfx2wY1COcFPlw");'></div>

                    <span class="text-sm font-semibold text-[#333333]">Admin</span>
                </div>

            </div>

        </header>



        {{-- Body content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>
