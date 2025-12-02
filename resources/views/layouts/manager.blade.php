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

            <a href="{{ route('manager.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.dashboard') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">dashboard</span>
                لوحة التحكم
            </a>

            <a href="{{ route('manager.tutors.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.tutors.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">group</span>
                المدربون
            </a>

            <a href="{{ route('manager.courses.index') }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg
               {{ request()->routeIs('manager.courses.*') ? 'bg-[#1E90FF]' : 'hover:bg-[#1E90FF]/70' }}">
                <span class="material-symbols-outlined">library_books</span>
                الدورات
            </a>

        </nav>

        {{-- Logout (later when auth added) --}}
        <a href="#" class="px-3 py-2 hover:bg-[#1E90FF]/70 rounded-lg flex items-center gap-2">
            <span class="material-symbols-outlined">logout</span>
            تسجيل الخروج
        </a>

    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-8">

        <h1 class="text-3xl font-extrabold text-[#003366] mb-6">
            @yield('title')
        </h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')

    </main>

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة المدير')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap"
          rel="stylesheet">

    <style>
        body { font-family: 'Tajawal', sans-serif; }
    </style>
</head>

<body class="bg-[#f4f6fa]">

<div class="flex min-h-screen">

    {{-- Sidebar --}} 
    <aside class="w-64 bg-[#003366] text-white flex flex-col">

        <div class="p-6 flex flex-col gap-6">

            {{-- Logo --}} 
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/cat-logo.png') }}" class="w-12 h-12 rounded-full">
                <h1 class="text-xl font-bold">Manager Panel</h1>
            </div>

            <nav class="flex flex-col gap-2">

                <a href="{{ route('manager.dashboard') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF]
                   {{ request()->routeIs('manager.dashboard') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">dashboard</span>
                    <span class="text-sm font-medium">لوحة التحكم</span>
                </a>

                <a href="{{ route('manager.tutors.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF]
                   {{ request()->routeIs('manager.tutors.*') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">group</span>
                    <span class="text-sm font-medium">المدربون</span>
                </a>

                <a href="{{ route('manager.courses.index') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF]
                   {{ request()->routeIs('manager.courses.*') ? 'bg-[#1E90FF]' : '' }}">
                    <span class="material-symbols-outlined">library_books</span>
                    <span class="text-sm font-medium">الدورات</span>
                </a>

            </nav>
        </div>

        <div class="mt-auto p-6">
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-[#1E90FF]">
                <span class="material-symbols-outlined">logout</span>
                <span>تسجيل الخروج</span>
            </a>
        </div>

    </aside>

    {{-- Main --}} 
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold text-[#003366] mb-6">@yield('title')</h1>
        @yield('content')
    </main>

</div>

</body>
</html>
<!DOCTYPE html>
<html class="light" dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CAT System - Manager</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script id="tailwind-config">
        tailwind.config = {
          darkMode: "class",
          theme: {
            extend: {
              colors: {
                "primary": "#2578f4",
                "background-light": "#f5f7f8",
                "background-dark": "#101722",
              },
              fontFamily: {
                "display": ["Inter"]
              },
              borderRadius: {
                "DEFAULT": "0.5rem",
                "lg": "1rem",
                "xl": "1.5rem",
                "full": "9999px"
              },
            },
          },
        }
    </script>
</head>

<body class="font-display bg-background-light dark:bg-background-dark text-slate-800 dark:text-slate-200">

<div class="relative flex min-h-screen w-full">

    {{-- SIDEBAR --}}
    <aside class="flex-shrink-0 w-64 bg-white dark:bg-slate-900/50 border-l border-slate-200 dark:border-slate-800 p-4">
        <div class="flex h-full flex-col justify-between">

            <div class="flex flex-col gap-4">
                {{-- Logo + Title --}}
                <div class="flex items-center gap-3">
                    <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full size-10"
                         data-alt="System logo"
                         style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuApmYLUkbAewKO5M-xhf_U2zAElVYOvhJ5cFxTUB_QngXtH5-RRwQLLN3oAM8rBaJmkpIZTmaDBKjGTByCOnj9WXAL63Y0eDbnLm_5N-bz1o77fWrblLWnaHcka55BxKOMROFQwMVWj_voKhKLTCINOd3YKQToQ-AwbWNNm5ubKxDmPDIb-SbZEX6bEbbzyHnqURsgdnnmW8H5iMRbwM5YSTuwwG9En_DDZTWTYtLS2s6Ti4fATN-X5Set3JSMjmtg0yQFlJacWqTY");'></div>

                    <div class="flex flex-col">
                        <h1 class="text-slate-900 dark:text-white text-base font-medium leading-normal">نظام CAT</h1>
                        <p class="text-slate-500 dark:text-slate-400 text-sm font-normal leading-normal">
                            لوحة تحكم مدير المركز
                        </p>
                    </div>
                </div>

                {{-- NAV --}}
                <nav class="flex flex-col gap-2 mt-4">

                    <a href="{{ route('manager.dashboard') }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg
                              {{ request()->routeIs('manager.dashboard') ? 'bg-primary/20 text-primary dark:bg-primary/30' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                        <span class="material-symbols-outlined">dashboard</span>
                        <p class="text-sm font-medium leading-normal">لوحة التحكم</p>
                    </a>

                    <a href="{{ route('manager.courses.index') }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg
                              {{ request()->routeIs('manager.courses.*') ? 'bg-primary/20 text-primary dark:bg-primary/30' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800' }}">
                        <span class="material-symbols-outlined">import_contacts</span>
                        <p class="text-sm font-medium leading-normal">الدورات</p>
                    </a>

                    <a href="{{ route('manager.students.index') }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                        <span class="material-symbols-outlined">school</span>
                        <p class="text-sm font-medium leading-normal">الطلاب</p>
                    </a>

                    <a href="{{ route('manager.tutors.index') }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                        <span class="material-symbols-outlined">co_present</span>
                        <p class="text-sm font-medium leading-normal">المدرسين</p>
                    </a>

                    <a href="{{ route('manager.reports.index') }}"
                       class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                        <span class="material-symbols-outlined">analytics</span>
                        <p class="text-sm font-medium leading-normal">التقارير</p>
                    </a>
                </nav>
            </div>

            <div class="flex flex-col gap-1">
                <a href="{{ route('manager.settings') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="material-symbols-outlined">settings</span>
                    <p class="text-sm font-medium leading-normal">الإعدادات</p>
                </a>

                <a href="{{ route('manager.logout') }}"
                   class="flex items-center gap-3 px-3 py-2 rounded-lg text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-slate-800">
                    <span class="material-symbols-outlined">logout</span>
                    <p class="text-sm font-medium leading-normal">تسجيل الخروج</p>
                </a>
            </div>

        </div>
    </aside>

    {{-- MAIN CONTENT --}}
    <main class="flex-1 p-8 overflow-y-auto">

        {{-- Page title --}}
        @hasSection('title')
            <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                <p class="text-slate-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
                    @yield('title')
                </p>

                @yield('actions') {{-- Optional: for page buttons like "إضافة دورة جديدة" --}}
            </div>
        @endif

        {{-- Page body --}}
        @yield('content')

    </main>
</div>

</body>
</html>
