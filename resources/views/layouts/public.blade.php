<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'منصة التدريب الاحترافية')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Tajawal', sans-serif; }

        .hover-nav:hover {
            color: #ffffff !important;
        }

        /* Make navbar toggler icon white */
        .navbar-toggler-icon {
            filter: invert(1);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm" style="background-color:#003366;">
    <div class="container">

        <!-- Logo / Brand -->
        <a class="navbar-brand fw-bold text-white" href="{{ route('home') }}">
            CAT
        </a>

        <!-- Mobile toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse justify-content-end" id="mainNavbar">

            <ul class="navbar-nav align-items-center gap-lg-3">

                <li class="nav-item">
                    <a class="nav-link text-white-50 fw-semibold hover-nav" href="{{ route('home') }}">
                        الرئيسية
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white-50 fw-semibold hover-nav" href="{{ route('about') }}">
                        من نحن
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white-50 fw-semibold hover-nav" href="{{ route('contact') }}">
                        تواصل معنا
                    </a>
                </li>

                <!-- Login Button -->
                <li class="nav-item">
                    <a href="{{ route('login.form') }}" 
                        class="btn btn-outline-light px-4 py-1 fw-bold"
                        style="border-width:2px;">
                        تسجيل الدخول
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>

<!-- Main Content -->
<main>
    @yield('content')
</main>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Page-specific scripts -->
@stack('scripts')

</body>
</html>
