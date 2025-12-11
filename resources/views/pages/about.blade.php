@extends('layouts.public')

{{-- صفحة حول النظام --}}
@section('title', 'حول النظام')

@section('content')

{{-- 📘 القسم الرئيسي: العنوان والأيقونة (Hero Banner) --}}
<section class="py-5 text-white" style="background-color: #0056b3; background-image: linear-gradient(135deg, #0056b3 0%, #007bff 100%);">
    <div class="container py-4">
        <div class="text-center">

            {{-- ✔ تمت إزالة الشكل البيضاوي — الأيقونة فقط --}}
            <i class="fas fa-desktop fa-4x mb-4 text-white"></i>

            <h1 class="display-5 fw-bolder mb-3">
                ما هو <span class="text-white border-bottom border-3 border-light pb-1">CAT</span>؟
            </h1>

            <p class="lead mt-3 mx-auto" style="max-width: 800px; color: rgba(255, 255, 255, 0.9);">
                CAT هو نظام بسيط يساعد الطلاب على إدارة الدورات ومعلومات الحساب 
                داخل مراكز التدريب بطريقة واضحة وسهلة.
            </p>
        </div>
    </div>
</section>

{{-- 🚀 المميزات الرئيسية --}}
<section class="container py-5">
    <h2 class="text-center display-6 fw-bold mb-5" style="color:#003366;">نظام متكامل بين يديك</h2>
    <div class="row justify-content-center">
        
        {{-- بطاقة 1 --}}
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-lg p-4 bg-white hover-scale">
                <div class="card-body">

                    <h3 class="h4 fw-bold mb-4 d-flex align-items-center" style="color:#0056b3;">
                        <i class="fas fa-cogs fa-2x me-3 text-primary"></i>
                        ماذا يمكنني أن أفعل داخل النظام؟
                    </h3>

                    <ul class="list-unstyled fw-medium space-y-3">
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-plus-square fa-fw text-success me-3 mt-1"></i>
                            التسجيل في الدورات المتاحة.
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-user-shield fa-fw text-success me-3 mt-1"></i>
                            متابعة بيانات حسابك بسهولة.
                        </li>
                        <li class="d-flex align-items-start mb-3">
                            <i class="fas fa-users fa-fw text-success me-3 mt-1"></i>
                            الاطلاع على المدربين والمراكز.
                        </li>
                        <li class="d-flex align-items-start mb-2">
                            <i class="fas fa-calendar-check fa-fw text-success me-3 mt-1"></i>
                            معرفة الدورات التي التحقت بها.
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        {{-- بطاقة 2 --}}
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-lg p-4 bg-white hover-scale">
                <div class="card-body">

                    <h3 class="h4 fw-bold mb-4 d-flex align-items-center" style="color:#0056b3;">
                        <i class="fas fa-bullseye fa-2x me-3 text-info"></i>
                        الهدف من إنشائه
                    </h3>

                    <p class="lead fw-normal mb-3" style="color:#333;">
                        الهدف هو تقديم نظام واضح للطلاب بدل التشتت بين الأوراق والرسائل.
                    </p>

                    <p class="text-secondary fs-5 mb-4">
                        <strong>مكان واحد بسيط يجمع كل شيء.</strong>
                    </p>

                    <div class="text-center mt-5">
                        <i class="fas fa-rocket fa-5x" style="color:#e0f7fa;"></i> 
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>

{{-- CTA --}}
<section class="py-5" style="background-color: #f4f7fb;">
    <div class="container text-center">
        <h2 class="fw-bold mb-3" style="color:#003366;">ابدأ الآن</h2>
        <p class="text-secondary mb-4 fs-5">سجل حسابك للوصول إلى الدورات بسهولة</p>

        <a href="{{ route('student.register') }}" 
           class="btn btn-primary btn-lg px-5 py-3 fw-bold shadow-lg text-white"
           style="background-color: #1E90FF; border-color: #1E90FF;">
            <i class="fas fa-sign-in-alt me-2"></i>
            تسجيل جديد
        </a>
    </div>
</section>

@endsection
