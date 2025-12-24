<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | منظومة CAT</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root { 
            --primary-blue: #003366; 
            --bg-body: #f8fafc; 
        }
        
        body { 
            font-family: 'Tajawal', sans-serif; 
            background-color: var(--bg-body); 
            color: #1e293b; 
        }

        /* Navbar Layout - Ultra Clean */
        .navbar { 
            background: white !important; 
            box-shadow: 0 1px 15px rgba(0,0,0,0.04); 
            padding: 8px 0;
            border-bottom: none; /* تم إزالة الخط الأزرق نهائياً */
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .navbar-brand img { 
            height: 42px; 
            margin-left: 12px;
        }

        /* النص بجانب اللوجو */
        .brand-divider {
            height: 24px;
            width: 2px;
            background-color: #e2e8f0;
            margin-left: 12px;
        }

        .brand-subtitle {
            font-weight: 700;
            color: var(--primary-blue);
            font-size: 1.05rem;
            letter-spacing: -0.2px;
        }

        /* Navigation Links */
        .nav-link { 
            color: #64748b !important; 
            font-weight: 500; 
            padding: 8px 18px !important;
            transition: 0.2s;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        .nav-link:hover { 
            color: var(--primary-blue) !important;
            background-color: #f1f5f9;
        }
        
        .nav-link.active { 
            color: var(--primary-blue) !important; 
            background-color: #f0f7ff !important;
            font-weight: 700;
        }

        /* Logout Button */
        .btn-logout { 
            color: #e11d48; 
            background: #fff1f2;
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 6px 14px;
            transition: 0.3s;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover { 
            background: #ffe4e6;
            color: #be123c;
        }

        main { min-height: 85vh; }
        
        footer {
            padding: 20px 0;
            color: #94a3b8;
            font-size: 0.8rem;
            background: white;
            border-top: 1px solid #f1f5f9;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('student.centers.index') }}">
            <img src="{{ asset('images/cat-logo.png') }}" alt="CAT Logo">
            <div class="brand-divider"></div>
            <span class="brand-subtitle">بوابة التدريب</span>
        </a>
        
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#studentNav">
            <span class="navbar-toggler-icon text-dark"></span>
        </button>

        <div class="collapse navbar-collapse" id="studentNav">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('student.centers.*') ? 'active' : '' }}" 
                       href="{{ route('student.centers.index') }}">
                        المراكز التدريبية
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('student.enrollments.*') ? 'active' : '' }}" 
                       href="{{ route('student.enrollments.index') }}">
                        سجل تسجيلاتي
                    </a>
                </li>
            </ul>
            
            <div class="ms-lg-3">
                <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-logout shadow-sm">
                        <span>خروج</span>
                        <i class="bi bi-box-arrow-left"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<main class="container py-5">
    @if(session('success'))
        <div class="alert alert-success shadow-sm rounded-4 border-0">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm rounded-4 border-0">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="text-center">
    <div class="container">
        <p class="mb-0">نظام CAT التدريبي &copy; {{ date('Y') }}</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>