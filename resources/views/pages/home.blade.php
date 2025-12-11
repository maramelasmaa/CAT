@extends('layouts.public')

@section('title', 'الصفحة الرئيسية')

@section('content')
<div class="hero">
    <div class="container">
        <img src="{{ asset('images/cat-logo.png') }}" alt="Logo" class="rounded-circle mb-4" width="120">
        <h1>مرحبًا بكم في منصة التدريب الاحترافية</h1>
        <p>إدارة الدورات، المدرّبين، والطلاب بسهولة واحترافية</p>

        {{-- LOGIN + REGISTER BUTTONS --}}
        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('login.form') }}" class="btn btn-primary-custom btn-lg">
                تسجيل الدخول
            </a>

            <a href="{{ route('student.register') }}" class="btn btn-outline-primary btn-lg" style="border-width:2px;">
                إنشاء حساب جديد
            </a>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <h3>دورات احترافية</h3>
            <p>تعلم من أفضل المدرّبين واحصل على شهادات معترف بها.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h3>إدارة سهلة</h3>
            <p>لوحة تحكم سهلة الاستخدام لإدارة الطلاب والمدرّبين والدورات.</p>
        </div>
        <div class="col-md-4 mb-4">
            <h3>تقارير مفصلة</h3>
            <p>تحليل شامل لأداء الطلاب والمدرّبين والدورات.</p>
        </div>
    </div>
</div>
@endsection
