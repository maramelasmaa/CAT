@extends('layouts.public')

@section('title', 'اتصل بنا')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <header class="text-center mb-5">
                <i class="bi bi-headset text-primary display-4 mb-3"></i>
                <h1 class="display-4 fw-bold text-primary">تواصل معنا</h1>
                <p class="lead text-muted mt-3">
                    نحن هنا للإجابة على جميع استفساراتك وتقديم الدعم الفني. لا تتردد في التواصل معنا!
                </p>
            </header>

            <div class="row text-center mb-5">
                <div class="col-md-6 mb-4">
                    <div class="p-4 border rounded-3 h-100 shadow-sm">
                        <i class="bi bi-envelope text-primary h3 mb-2"></i>
                        <h5 class="fw-bold mt-2">الدعم الفني</h5>
                        <p class="mb-0">
                            للاستفسارات التقنية والمساعدة في المنصة:
                            <br>
                            <a href="mailto:support@cat.com" class="text-decoration-none fw-bold text-primary">support@cat.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="p-4 border rounded-3 h-100 shadow-sm">
                        <i class="bi bi-info-circle text-primary h3 mb-2"></i>
                        <h5 class="fw-bold mt-2">الاستفسارات العامة</h5>
                        <p class="mb-0">
                            للشراكات والتساؤلات الإدارية الأخرى:
                            <br>
                            <a href="mailto:info@cat.com" class="text-decoration-none fw-bold text-primary">info@cat.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="card shadow-lg">
                <div class="card-body p-4 p-md-5">
                    <h3 class="card-title text-center fw-bold mb-4">أرسل رسالة مباشرة</h3>
                    <p class="text-center text-muted">يمكنك استخدام النموذج لإرسال استفسارك مباشرة وسنرد عليك خلال 24 ساعة.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection