<!DOCTYPE html>
<html class="light" dir="rtl" lang="ar">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>تسجيل الدخول - CAT</title>

{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

{{-- Fonts --}}
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#00366c",
                "background-light": "#f5f7f8",
                "background-dark": "#0f1923",
                "brand-medium-blue": "#1E90FF",
                "brand-darker-blue": "#0077E6"
            },
            fontFamily: { display: ["Lexend","Tajawal","sans-serif"] },
            borderRadius: { DEFAULT: "0.5rem", lg: "1rem", xl: "1.5rem", full: "9999px" }
        }
    }
};
</script>

<style>
.form-input { -webkit-appearance: none; -moz-appearance: none; appearance: none; }
</style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">

<div class="flex min-h-screen w-full">

    {{-- LEFT PANEL --}}
    <div class="hidden lg:flex w-[35%] bg-gradient-to-b from-[#1E90FF] to-[#003366] flex-col justify-center items-center p-12 text-white text-center">
        <img src="{{ asset('images/cat-logo.png') }}" class="h-32 w-32 rounded-full mb-6" alt="CAT Logo">
        <h1 class="text-2xl font-bold mb-2">مرحبًا بك في CAT</h1>
        <p class="text-lg">المنصة الذكية لإدارة التسجيل والدورات</p>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="flex flex-col w-full lg:w-[65%] justify-center items-center p-12 bg-white dark:bg-slate-900">
        <div class="flex flex-col max-w-[480px] w-full">

            {{-- Heading --}}
            <h2 class="text-[#003366] dark:text-primary text-[28px] font-bold mb-6 text-right">
                تسجيل الدخول إلى حسابك
            </h2>

            {{-- FORM CONTENT --}}
            @yield('content')

        </div>
    </div>

</div>
</body>
</html>