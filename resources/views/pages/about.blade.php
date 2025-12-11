@extends('layouts.public')

@section('title', 'حول')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <header class="text-center mb-5">
                <i class="bi bi-lightbulb text-primary display-4 mb-3"></i>
                <h1 class="display-4 fw-bold text-primary">قصة CAT System</h1>
            </header>

            <div class="card shadow-lg border-0 mb-5">
                <div class="card-body p-4 p-md-5 text-center">
                    <h2 class="h3 fw-bold mb-3">الرؤية والهدف</h2>
                    <p class="lead text-muted">
                        نظام **CAT System** هو حل متكامل بُني خصيصًا لتمكين المراكز التدريبية من تحقيق أقصى كفاءة في التشغيل. 
                        هدفنا هو تبسيط عملية إدارة الدورات، تسهيل التواصل بين المدرّبين والطلاب، وتقديم بيئة تعليمية احترافية رقمية بالكامل.
                    </p>
                </div>
            </div>

            <div class="row mt-5 text-center">
                <div class="col-md-4 mb-4">
                    <i class="bi bi-check-circle text-primary h2 mb-3"></i>
                    <h3 class="h5 fw-bold">الاحترافية</h3>
                    <p class="text-muted">نلتزم بأعلى معايير الجودة في تقديم خدماتنا ومنصتنا.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="bi bi-gem text-primary h2 mb-3"></i>
                    <h3 class="h5 fw-bold">الابتكار</h3>
                    <p class="text-muted">نسعى دائمًا لإضافة أحدث الميزات التكنولوجية لخدمة المستخدمين.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <i class="bi bi-people text-primary h2 mb-3"></i>
                    <h3 class="h5 fw-bold">التركيز على المستخدم</h3>
                    <p class="text-muted">تصميم المنصة يركز على سهولة الاستخدام وتلبية احتياجات كل من الطالب والمدرّب والمركز.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection