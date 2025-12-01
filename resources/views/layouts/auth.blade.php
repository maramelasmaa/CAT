<!DOCTYPE html>
<html class="light" dir="rtl" lang="ar">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>تسجيل الدخول / التسجيل - CAT</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    {{-- Fonts --}}
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#00366c",
                        "background-light": "#f5f7f8",
                        "background-dark": "#0f1923",
                        "brand-dark-navy": "#003366",
                        "brand-medium-blue": "#1E90FF",
                        "brand-darker-blue": "#0077E6",
                        "brand-dark-blue-link": "#004B8D",
                        "brand-border-light-gray": "#E0E0E0",
                    },
                    fontFamily: {
                        "display": ["Lexend", "Tajawal", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.5rem",
                        "lg": "1rem",
                        "xl": "1.5rem",
                        "full": "9999px"
                    },
                },
            },
        };
    </script>

    <style>
        .form-input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display" style='font-family: Lexend, "Noto Sans", sans-serif;'>

<div class="relative flex h-auto min-h-screen w-full flex-col overflow-x-hidden">

    <div class="flex flex-1 w-full">

        {{-- LEFT: FORM SIDE --}}
        <div class="flex flex-col w-full lg:w-[70%] bg-white dark:bg-slate-900 justify-center items-center p-6 sm:p-8 lg:p-12">
            <div class="flex flex-col max-w-[480px] w-full">

                {{-- Logo --}}
                <div class="flex items-center gap-4 mb-4">
                    <svg class="h-10 w-10 text-primary" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.25 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM10.5 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM6.75 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM5.25 10.5A2.25 2.25 0 0 1 7.5 8.25h9a2.25 2.25 0 0 1 2.25 2.25v9A2.25 2.25 0 0 1 16.5 21.75h-9A2.25 2.25 0 0 1 5.25 19.5v-9Zm1.5 0v9a.75.75 0 0 0 .75.75h9a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-9a.75.75 0 0 0-.75.75Z"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <h1 class="text-2xl font-bold text-slate-800 dark:text-slate-200">CAT</h1>
                </div>

                {{-- Subtitle / intro --}}
                <h2 class="text-slate-700 dark:text-slate-300 tracking-light text-lg font-normal leading-tight text-right pb-4">
                    مرحبًا بك في CAT المنصة الذكية لإدارة التسجيل والدورات.
                </h2>

                {{-- FORM CONTENT FROM CHILD VIEW --}}
                @yield('content')

            </div>
        </div>

        {{-- RIGHT: GRADIENT BRAND PANEL --}}
        <div class="hidden lg:flex w-[30%] bg-gradient-to-br from-[#1E90FF] to-[#003366] items-center justify-center p-12">
            <div class="flex flex-col items-center justify-center text-center text-white">
                <svg class="h-32 w-32 mb-6" fill="none" stroke="currentColor" stroke-width="1.5"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.25 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM10.5 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM6.75 6.087c0-.66.538-1.192 1.2-1.192h.6c.662 0 1.2.532 1.2 1.192v.601c0 .66-.538 1.192-1.2 1.192h-.6c-.662 0-1.2-.532-1.2-1.192v-.601ZM5.25 10.5A2.25 2.25 0 0 1 7.5 8.25h9a2.25 2.25 0 0 1 2.25 2.25v9A2.25 2.25 0 0 1 16.5 21.75h-9A2.25 2.25 0 0 1 5.25 19.5v-9Zm1.5 0v9a.75.75 0 0 0 .75.75h9a.75.75 0 0 0 .75-.75v-9a.75.75 0 0 0-.75-.75h-9a.75.75 0 0 0-.75.75Z"
                          stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <h1 class="text-5xl font-bold">CAT</h1>
                <p class="mt-4 text-xl">المنصة الذكية لإدارة التسجيل والدورات</p>
            </div>
        </div>

    </div>
</div>

</body>
</html>
