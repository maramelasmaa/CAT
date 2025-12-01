<!DOCTYPE html>
<html class="light" dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CAT - Student</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&family=Cairo:wght@400;500;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <style>
        body {
            font-family: 'Tajawal', 'Cairo', sans-serif;
        }
    </style>

    <script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
              "primary": "#1E90FF",
              "background-light": "#F7F9FB",
              "background-dark": "#0f1923",
              "text-light": "#333333",
              "text-dark": "#d1d5db",
              "title-light": "#003366",
              "title-dark": "#93c5fd",
            },
            fontFamily: {
              "display": ["Tajawal", "Cairo", "sans-serif"]
            },
            borderRadius: {
              "DEFAULT": "0.5rem",
              "lg": "1rem",
              "xl": "1.5rem",
              "full": "9999px"
            },
            boxShadow: {
              'custom-light': '0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -2px rgba(0, 0, 0, 0.05)',
              'card-light': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1)',
            }
          },
        },
      }
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark font-display text-text-light dark:text-text-dark">

<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">

    {{-- HEADER --}}
    <header class="sticky top-0 z-10 flex items-center justify-between whitespace-nowrap bg-white dark:bg-background-dark/80 backdrop-blur-sm px-4 sm:px-8 py-3 shadow-custom-light">
        <div class="flex items-center gap-4 text-title-light dark:text-title-dark">
            <div class="size-6 text-[#003366] dark:text-blue-300">
                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.8261 17.4264C16.7203 18.1174 20.2244 18.5217 24 18.5217C27.7756 18.5217 31.2797 18.1174 34.1739 17.4264C36.9144 16.7722 39.9967 15.2331 41.3563 14.1648L24.8486 40.6391C24.4571 41.267 23.5429 41.267 23.1514 40.6391L6.64374 14.1648C8.00331 15.2331 11.0856 16.7722 13.8261 17.4264Z" fill="currentColor"></path>
                    <path clip-rule="evenodd" d="M39.998 12.236C39.9944 12.2537..."
                          fill="currentColor" fill-rule="evenodd"></path>
                </svg>
            </div>
            <h2 class="text-title-light dark:text-title-dark text-lg font-bold leading-tight tracking-[-0.015em]">CAT</h2>
        </div>

        {{-- Search center/courses --}}
        <div class="flex-1 max-w-lg mx-4">
            <label class="flex flex-col min-w-40 h-10 w-full">
                <div class="flex w-full flex-1 items-stretch rounded-lg h-full">
                    <div class="text-[#47739e] dark:text-slate-400 flex border-none bg-[#e6edf4] dark:bg-background-dark items-center justify-center pl-4 rounded-r-lg border-r-0">
                        <span class="material-symbols-outlined">search</span>
                    </div>
                    <input
                        class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-lg text-text-light dark:text-text-dark focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-[#e6edf4] dark:bg-background-dark focus:border-none h-full placeholder:text-[#47739e] dark:placeholder:text-slate-400 px-4 rounded-r-none border-l-0 pl-2 text-base font-normal leading-normal"
                        placeholder="ابحث عن مركز أو دورة..."
                        value=""
                    />
                </div>
            </label>
        </div>

        <div class="flex gap-2 items-center">
            <button class="hidden sm:flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 px-4 bg-transparent text-text-light dark:text-text-dark text-sm font-bold leading-normal tracking-[0.015em]">
                <span class="truncate">
                    {{ auth('student')->user()->name ?? 'الطالب' }}
                </span>
            </button>
            <form action="{{ route('student.logout') }}" method="POST">
                @csrf
                <button type="submit"
                        class="flex max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-10 bg-transparent text-text-light dark:text-text-dark gap-2 text-sm font-bold leading-normal tracking-[0.015em] min-w-0 px-2.5">
                    <span class="material-symbols-outlined">logout</span>
                </button>
            </form>
        </div>
    </header>

    {{-- MAIN CONTENT --}}
    <div class="layout-container flex h-full grow flex-col">
        <main class="flex-1 p-4 sm:p-6">
            @yield('content')
        </main>
    </div>

</div>

</body>
</html>
