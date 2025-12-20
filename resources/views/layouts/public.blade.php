<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | CAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root { --main-blue: #003366; --accent-blue: #0066cc; --glass: rgba(255, 255, 255, 0.95); }
        body { font-family: 'Tajawal', sans-serif; background: #fdfdfd; color: #1a1a1a; scroll-behavior: smooth; }

        /* Modern Navbar */
        .navbar { 
            background: var(--glass) !important; 
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 18px 0;
        }
        .navbar-brand { font-weight: 800; font-size: 1.6rem; color: var(--main-blue) !important; letter-spacing: -1px; }
        
        .nav-link { 
            font-weight: 500; color: #555 !important; 
            margin: 0 10px; transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .nav-link:hover { color: var(--accent-blue) !important; transform: translateY(-1px); }

        .btn-auth {
            background: var(--main-blue); color: white !important;
            padding: 10px 28px; border-radius: 12px; font-weight: 700;
            transition: 0.4s; border: none; box-shadow: 0 4px 15px rgba(0,51,102,0.2);
        }
        .btn-auth:hover,
        .btn-auth:focus,
        .btn-auth:active {
            background: var(--main-blue) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,51,102,0.3);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">منظومة <span style="color:var(--accent-blue)">CAT</span></a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="mainNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">من نحن</a></li>
                <li class="nav-item ms-lg-3"><a href="{{ route('login.form') }}" class="btn btn-auth">تسجيل الدخول</a></li>
            </ul>
        </div>
    </div>
</nav>

<main> @yield('content') </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>