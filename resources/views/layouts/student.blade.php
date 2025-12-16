<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CAT')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Tajawal', sans-serif; background:#f8f9fa; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg" style="background:#003366;">
    <div class="container">
        <a class="navbar-brand text-white fw-bold" href="{{ route('student.centers.index') }}">
            CAT
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="text-white">
                أهلاً {{ strtok(auth('web')->user()->name, ' ') }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-light btn-sm">خروج</button>
            </form>
        </div>
    </div>
</nav>

<main class="container py-4 text-end">
    @yield('content')
</main>

</body>
</html>
