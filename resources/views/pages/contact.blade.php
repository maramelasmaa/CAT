@extends('layouts.public')

@section('title', 'اتصل بنا')

@section('content')

<div class="container py-5">

    {{-- عنوان الصفحة --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold" style="color:#003366;">اتصل بنا</h1>
        <p class="text-muted mt-3" style="max-width:700px; margin:auto;">
            إذا واجهت مشكلة أو لديك سؤال بخصوص النظام، يمكنك التواصل عبر البريد الإلكتروني،
            أو إرسال رسالة من خلال النموذج أدناه.
        </p>
    </div>

    {{-- معلومات التواصل --}}
    <div class="row justify-content-center mb-4 gy-4">

        <div class="col-md-6">
            <div class="p-4 bg-white shadow-sm rounded h-100">
                <h5 class="fw-bold mb-2" style="color:#0056b3;">الدعم الفني</h5>
                <p class="text-muted mb-1">للمشاكل التقنية أو أي صعوبات داخل النظام:</p>
                <a href="mailto:support@cat.com" class="fw-bold" style="color:#003366;">
                    support@cat.com
                </a>
            </div>
        </div>

        <div class="col-md-6">
            <div class="p-4 bg-white shadow-sm rounded h-100">
                <h5 class="fw-bold mb-2" style="color:#0056b3;">الاستفسارات العامة</h5>
                <p class="text-muted mb-1">للأسئلة العامة أو التواصل الإداري:</p>
                <a href="mailto:info@cat.com" class="fw-bold" style="color:#003366;">
                    info@cat.com
                </a>
            </div>
        </div>

    </div>

    {{-- نموذج الرسالة --}}
    <div class="row justify-content-center mt-4">

        <div class="col-lg-8">
            <div class="p-4 shadow-sm rounded bg-white">

                <h5 class="fw-bold mb-3 text-center" style="color:#0056b3;">إرسال رسالة</h5>

                <p class="text-muted text-center mb-4">
                    اكتب رسالتك هنا وسنقوم بالرد عليك في أقرب وقت.
                </p>

                <form>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">الاسم</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">البريد الإلكتروني</label>
                        <input type="email" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">الرسالة</label>
                        <textarea rows="4" class="form-control"></textarea>
                    </div>

                    <button class="btn px-4 py-2 fw-bold text-white mt-2" 
                        style="background-color:#003366;">
                        إرسال
                    </button>
                </form>

            </div>
        </div>

    </div>

</div>

@endsection
