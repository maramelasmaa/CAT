@extends('layouts.public')

@section('title', 'منصة CAT: بداية رحلتك نحو التميز')

@section('content')

<div class="hero text-center py-5" style="background-color: #e9f5ff; border-bottom: 5px solid #0056b3;">
    <div class="container py-5">
        
        <img src="{{ asset('images/cat-logo.png') }}" alt="شعار CAT" 
             class="rounded-circle mb-4 shadow-lg border border-5" width="180" height="180" 
             style="object-fit: cover; border-color: white !important;">

        <h1 class="display-3 fw-bolder mb-3" style="color: #00366c;">
            مرحبًا بك في <span style="color: #007bff;">CAT System</span>
        </h1>
        
        <p class="lead mb-5 mx-auto text-secondary" style="max-width: 700px;">
            منصتنا هنا لتجعل رحلتك التعليمية أسهل وأكثر تنظيمًا. انضم إلينا وابدأ مغامرتك اليوم!
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('student.register') }}" 
               class="btn btn-lg px-5 py-3 shadow-lg fw-bold text-white"
               style="background-color: #1E90FF; border-color: #1E90FF;">
                ابدأ رحلتك الآن!
            </a>

            <a href="{{ route('login.form') }}" 
               class="btn btn-outline-primary btn-lg px-5 py-3 fw-bold" 
               style="border-width: 2px; color: #007bff; border-color: #007bff;">
                لديّ حساب
            </a>
        </div>
    </div>
</div>


<div class="container py-5">
    <div class="text-center py-4">
        <h2 class="display-5 fw-bold mb-4" style="color: #00366c;">
            إلهامك اليومي يبدأ من هنا
        </h2>
        <p class="lead text-secondary mx-auto mb-5" style="max-width: 700px;">
            كل يوم فرصة جديدة للتعلم. دع هذه الاقتباسات تُلهمك نحو التميز.
        </p>
        
        <div class="row justify-content-center mt-5">
            <div class="col-md-8 col-lg-6">
                <div class="p-4 rounded-3 shadow bg-white border">
                    <p id="quote-display" class="fs-4 fw-light text-dark mb-3">
                        "ابدأ من حيث أنت. استخدم ما لديك. افعل ما تستطيع."
                    </p>
                    <p id="quote-author" class="text-secondary fw-bold">- آرثر آش</p>
                    <button id="new-quote-btn" class="btn btn-outline-info mt-3" style="color: #1E90FF; border-color: #1E90FF;">
                        اقتباس جديد
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<hr class="my-5">


<div style="background-color: #0056b3;" class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold text-white mb-4">اكتشف أكثر عن CAT</h2>
        <p class="lead text-white-50 mb-4">
            تعرّف على رؤيتنا وكيف نساعدك في رحلتك التعليمية.
        </p>
        <a href="{{ route('about') }}" 
           class="btn btn-outline-light btn-lg px-5 py-3 fw-bold border-2">
            المزيد عنا
        </a>
    </div>
</div>

@endsection


@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {

    const quotes = [
        { quote: "ابدأ من حيث أنت. استخدم ما لديك. افعل ما تستطيع.", author: "آرثر آش" },
        { quote: "لا تقم أبدًا بتأجيل العمل ليوم غد إذا كان بإمكانك القيام به اليوم.", author: "توماس جيفرسون" },
        { quote: "التعليم هو أقوى سلاح يمكنك استخدامه لتغيير العالم.", author: "نيلسون مانديلا" },
        { quote: "السر في المضي قدمًا هو البدء.", author: "أجاثا كريستي" },
        { quote: "الطريقة الوحيدة لعمل عمل عظيم هي أن تحب ما تفعله.", author: "ستيف جوبز" },
        { quote: "اجعل كل يوم تحفة فنية.", author: "جون وودن" },
        { quote: "لا تخجل من أخطائك، فهي ما تصنعك اليوم.", author: "جوردان بيترسون" }
    ];

    const quoteDisplay = document.getElementById('quote-display');
    const quoteAuthor = document.getElementById('quote-author');
    const newQuoteBtn = document.getElementById('new-quote-btn');

    function getRandomQuote() {
        return quotes[Math.floor(Math.random() * quotes.length)];
    }

    function displayQuote() {
        const q = getRandomQuote();
        quoteDisplay.textContent = `"${q.quote}"`;
        quoteAuthor.textContent = `- ${q.author}`;
    }

    displayQuote();

    newQuoteBtn.addEventListener('click', displayQuote);
});
</script>
@endpush
