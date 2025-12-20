@extends('layouts.public')
@section('title', 'حول النظام')

@section('content')
<section class="py-5 bg-dark text-white" style="background: url('https://www.transparenttextures.com/patterns/cubes.png'), var(--main-blue) !important;">
    <div class="container text-center py-5">
        <h1 class="display-2 fw-bold mb-4">ما هو <span class="text-info">CAT</span>؟</h1>
        <p class="fs-4 opacity-75 mx-auto" style="max-width: 800px;">
            CAT هو نظام بسيط يساعد الطلاب على إدارة الدورات ومعلومات الحساب داخل مراكز التدريب بطريقة واضحة وسهلة.
        </p>
    </div>
</section>

<section class="container py-5 mt-n5">
    <div class="row g-4 mt-n5">
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-5 p-5 h-100">
                <div class="icon-shape bg-primary text-white mb-4 shadow-sm">
                    <i class="fas fa-terminal"></i>
                </div>
                <h3 class="fw-bold mb-4">ماذا يمكنني أن أفعل داخل النظام؟</h3>
                <ul class="list-unstyled">
                    <li class="d-flex mb-3"><i class="fas fa-circle-check text-primary me-3 mt-1"></i> التسجيل في الدورات المتاحة.</li>
                    <li class="d-flex mb-3"><i class="fas fa-circle-check text-primary me-3 mt-1"></i> متابعة بيانات حسابك بسهولة.</li>
                    <li class="d-flex mb-3"><i class="fas fa-circle-check text-primary me-3 mt-1"></i> الاطلاع على المدربين والمراكز.</li>
                    <li class="d-flex"><i class="fas fa-circle-check text-primary me-3 mt-1"></i> معرفة الدورات التي التحقت بها.</li>
                </ul>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card border-0 shadow-lg rounded-5 p-5 h-100 bg-light">
                <div class="icon-shape bg-info text-white mb-4 shadow-sm">
                    <i class="fas fa-lightbulb"></i>
                </div>
                <h3 class="fw-bold mb-4">الهدف من إنشائه</h3>
                <p class="fs-5 text-muted mb-4">الهدف هو تقديم نظام واضح للطلاب بدل التشتت بين الأوراق والرسائل.</p>
                <div class="p-3 bg-white rounded-4 border-start border-primary border-5">
                    <p class="fw-bold mb-0">مكان واحد بسيط يجمع كل شيء.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .icon-shape { width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; border-radius: 18px; font-size: 1.5rem; }
    .mt-n5 { margin-top: -80px !important; }
    .card { transition: 0.3s; border: 1px solid #f0f0f0 !important; }
    .card:hover { transform: translateY(-10px); }
</style>
@endsection