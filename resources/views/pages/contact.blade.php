@extends('layouts.public')

@section('title', 'حول النظام')

@section('content')

{{-- القسم الرئيسي --}}
<section class="py-5" style="background-color: #f4f7fb;">
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="display-5 fw-bold" style="color:#003366;">ما هو CAT؟</h1>

            <p class="lead mt-3 mx-auto" style="max-width:800px; color:#6c757d;">
                CAT هو نظام بسيط يساعد الطلاب على إدارة الدورات ومعلومات الحساب 
                داخل مراكز التدريب بطريقة واضحة وسهلة.
            </p>
        </div>
    </div>
</section>

{{-- المميزات --}}
<section class="container py-5">
    <div class="row justify-content-center">
        
        {{-- بطاقة 1 --}}
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <h2 class="h4 fw-bold mb-4" style="color:#0056b3;">
                    ماذا يمكنني أن أفعل داخل النظام؟
                </h2>

                <ul class="list-unstyled" style="color:#333;">
                    <li class="mb-3 d-flex">
                        <span class="me-2" style="color:#003366;">•</span> 
                        التسجيل في الدورات المتاحة.
                    </li>
                    <li class="mb-3 d-flex">
                        <span class="me-2" style="color:#003366;">•</span> 
                        متابعة بيانات حسابك بسهولة.
                    </li>
                    <li class="mb-3 d-flex">
                        <span class="me-2" style="color:#003366;">•</span> 
                        الاطلاع على المدربين والمراكز.
                    </li>
                    <li class="mb-2 d-flex">
                        <span class="me-2" style="color:#003366;">•</span> 
                        معرفة الدورات التي التحقت بها.
                    </li>
                </ul>
            </div>
        </div>

        {{-- بطاقة 2 --}}
        <div class="col-lg-6 mb-4">
            <div class="card h-100 border-0 shadow-sm p-4">
                <h2 class="h4 fw-bold mb-4" style="color:#0056b3;">
                    لماذا تم إنشاؤه؟
                </h2>

                <p class="mb-3" style="color:#333;">
                    الهدف هو تقديم نظام واضح للطلاب بدل التشتت بين الأوراق والرسائل.
                </p>

                <p class="mb-4" style="color:#6c757d;">
                    مكان واحد بسيط يجمع كل شيء.
                </p>

                <div class="text-center mt-4">
                    <i class="fas fa-graduation-cap fa-4x" style="color:#d5dbe2;"></i>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- الدعوة للعمل --}}
<section class="py-5" style="background-color: #003366;">
    <div class="container text-center">
        <h2 class="fw-bold text-white mb-3">ابدأ الآن</h2>
        <p class="text-white-50 mb-4">سجل حسابك للوصول إلى الدورات بسهولة</p>

        <a href="{{ route('student.register') }}" 
           class="btn btn-light btn-lg px-5 py-2 fw-bold shadow-sm">
            تسجيل جديد
        </a>
    </div>
</section>

@endsection
