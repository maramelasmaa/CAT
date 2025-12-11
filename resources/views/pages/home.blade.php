@extends('layouts.public')

@section('title', 'منصة CAT: الإدارة والتدريب الاحترافي')

@section('content')

<div class="hero text-center py-6" style="background-color: #f8f9fa; border-bottom: 5px solid var(--bs-primary, #007bff);">
    <div class="container">
        <img src="{{ asset('images/cat-logo.png') }}" alt="شعار CAT" class="rounded-circle mb-4 shadow-lg" width="180" height="180" style="object-fit: cover; border: 4px solid white;">

        <h1 class="display-3 fw-bolder mb-3 text-dark">
            ارفع مستوى مركزك التدريبي مع <span class="text-primary">CAT System</span>
        </h1>
        
        <p class="lead mb-5 mx-auto text-muted" style="max-width: 800px;">
            نظام CAT هو الحل الشامل لإدارة الدورات، المدرّبين، والطلاب بذكاء وكفاءة رقمية متكاملة. ابدأ اليوم وحوّل التحديات الإدارية إلى فرص للنمو.
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('student.register') }}" class="btn btn-primary-custom btn-lg px-5 py-3 shadow-lg fw-bold">
                ابدأ رحلتك مجاناً الآن
                <i class="bi bi-arrow-left ms-2"></i> 
            </a>

            <a href="{{ route('login.form') }}" class="btn btn-outline-dark btn-lg px-5 py-3" style="border-width: 2px;">
                تسجيل الدخول للمستخدمين
            </a>
        </div>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5 text-dark">لماذا تختار منصة CAT؟</h2>
    
    <div class="row g-5 text-center">
        <div class="col-md-4">
            <i class="bi bi-book-half text-primary display-5 mb-3"></i>
            <h3 class="h4 fw-bold text-dark">تنظيم الدورات الشامل</h3>
            <p class="text-muted">
                تنظيم كامل لجداول الدورات، المواد التعليمية، وعمليات التسجيل إلكترونياً بكفاءة عالية.
            </p>
        </div>

        <div class="col-md-4">
            <i class="bi bi-people-fill text-primary display-5 mb-3"></i>
            <h3 class="h4 fw-bold text-dark">منصات عمل متخصصة</h3>
            <p class="text-muted">
                واجهات عمل منفصلة للمدرّبين والطلاب لتسهيل المتابعة، التواصل، والوصول إلى المعلومات الخاصة.
            </p>
        </div>

        <div class="col-md-4">
            <i class="bi bi-graph-up text-primary display-5 mb-3"></i>
            <h3 class="h4 fw-bold text-dark">قياس ومتابعة الأداء</h3>
            <p class="text-muted">
                مؤشرات أداء دقيقة لمتابعة تقدم الطلاب وتقييم كفاءة المدرّبين والنتائج الإجمالية للمركز.
            </p>
        </div>
    </div>
</div>

<hr class="my-5">

<div class="container py-5 text-center">
    <h2 class="fw-bold mb-4 text-dark">منصة صُممت لتلبية احتياجاتك</h2>
    <p class="lead text-muted mx-auto mb-5" style="max-width: 700px;">
        نحن نجمع بين القوة التقنية وسهولة الاستخدام لضمان تجربة مثالية لكل من يدير أو يتعلم في مركزك.
    </p>

    <a href="{{ route('about') }}" class="btn btn-outline-primary btn-lg px-5 py-3">
        اكتشف المزيد عنّا
    </a>
</div>

@endsection