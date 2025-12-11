<!DOCTYPE html>
<html class="light" dir="rtl" lang="ar">

<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>@yield('title', 'منصة CAT للمصادقة')</title>

{{-- Tailwind CSS CDN --}}
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

{{-- Fonts: استخدام خط "تاجوال" للعرض العربي بشكل أفضل --}}
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link href="https://fonts.gstatic.com" rel="preconnect" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet"/>

<script>
tailwind.config = {
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                primary: "#00366c", // Dark Blue (Main Brand)
                'background-light': "#f5f7f8",
                'background-dark': "#0f1923",
                'brand-blue': "#1E90FF", // Medium Blue (Accent)
                'brand-darker-blue': "#0077E6" // Darker Blue (Hover)
            },
            // استخدام تاجوال كخط أساسي للعرض العربي
            fontFamily: { display: ["Tajawal", "sans-serif"] },
            borderRadius: { 
                DEFAULT: "0.5rem", 
                lg: "1rem", 
                xl: "1.5rem", 
                full: "9999px" 
            }
        }
    }
};
</script>

<style>
/* إزالة سهم الإدخال الافتراضي */
.form-input { -webkit-appearance: none; -moz-appearance: none; appearance: none; }
</style>
</head>

<body class="bg-background-light dark:bg-background-dark font-display">

<div class="flex min-h-screen w-full">

    {{-- ⬅️ LEFT PANEL: الشعار والخلفية الجذابة (لشاشات العرض الكبيرة) --}}
    <div class="hidden lg:flex w-[35%] bg-gradient-to-b from-brand-blue to-primary flex-col justify-center items-center p-12 text-white text-center shadow-2xl">
        <img src="{{ asset('images/cat-logo.png') }}" class="h-40 w-40 rounded-full mb-8 border-4 border-white/30" alt="CAT Logo">
        <h1 class="text-4xl font-extrabold mb-3">أهلاً بك في CAT System</h1>
        <p class="text-lg opacity-90">منصة إدارة التدريب الأكثر ذكاءً واحترافية.</p>
    </div>

    {{-- ➡️ RIGHT PANEL: محتوى النموذج --}}
    <div class="flex flex-col w-full lg:w-[65%] justify-center items-center p-6 sm:p-12 bg-white dark:bg-slate-900">
        <div class="flex flex-col max-w-[480px] w-full p-6 sm:p-8 bg-white dark:bg-slate-800 rounded-xl shadow-2xl border dark:border-slate-700">

            {{-- العنوان الرئيسي --}}
            <h2 class="text-primary dark:text-brand-blue text-3xl font-extrabold mb-8 text-center">
                @yield('form-title', 'تسجيل الدخول / التسجيل')
            </h2>

            {{-- FORM CONTENT --}}
            @yield('content')
            
        </div>
    </div>

</div>
</body>
</html>