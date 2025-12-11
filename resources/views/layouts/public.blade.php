<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'منصة التدريب الاحترافية')</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Tajawal', sans-serif; }
        .hero {
            background-color: #f4f4f4;
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .hero h1 { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; }
        .hero p { font-size: 1.25rem; margin-bottom: 2rem; }
        .btn-primary-custom {
            background-color: #003366;
            border-color: #003366;
        }
        .btn-primary-custom:hover {
            background-color: #1E90FF;
            border-color: #1E90FF;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#003366;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">مركز التدريب</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">حول</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">اتصل بنا</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">تسجيل الدخول</a></li>
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
</body>
</html>
