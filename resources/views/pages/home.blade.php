@extends('layouts.public')
@section('title', 'منصة CAT: بداية رحلتك نحو التميز')

@section('content')
<section class="py-5 position-relative overflow-hidden" style="background: radial-gradient(circle at top right, #f0f7ff, #ffffff);">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start animate-fade-in">
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2; color: #001a33;">
                    مرحبًا بك في <span style="color: #0066cc;">CAT</span>
                </h1>
                <p class="lead text-muted mb-5 fs-4" style="max-width: 550px;">
                    منصتنا هنا لتجعل رحلتك التعليمية أسهل وأكثر تنظيمًا. انضم إلينا وابدأ مغامرتك اليوم!
                </p>
                <div class="d-flex gap-3 justify-content-center justify-content-lg-start">
                    <a href="{{ route('student.register') }}" class="btn btn-auth btn-lg px-5 py-3 rounded-pill">ابدأ رحلتك الآن</a>
                    <a href="{{ route('login.form') }}" class="btn btn-outline-secondary btn-lg px-5 py-3 rounded-pill fw-bold border-2">لديّ حساب</a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0">
                <div class="logo-wrapper">
                    <img src="{{ asset('images/cat-logo.png') }}" class="img-fluid rounded-circle shadow-2xl main-logo" alt="CAT Logo">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold h1">إلهامك اليومي يبدأ من هنا</h2>
            <div class="mx-auto bg-primary mt-2" style="height: 4px; width: 60px; border-radius: 2px;"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="quote-box p-5 rounded-5 shadow-sm text-center border">
                    <i class="fa fa-quote-right fa-2x mb-4 text-primary opacity-25"></i>
                    <p id="quote-display" class="fs-3 fw-light text-dark mb-4">"ابدأ من حيث أنت. استخدم ما لديك. افعل ما تستطيع."</p>
                    <h5 id="quote-author" class="fw-bold text-secondary mb-4">- آرثر آش</h5>
                    <button id="new-quote-btn" type="button" class="btn btn-light rounded-circle p-3 shadow-sm hover-rotate">
                        <i class="fas fa-sync-alt text-primary"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quoteDisplay = document.getElementById('quote-display');
        const quoteAuthor = document.getElementById('quote-author');
        const newQuoteButton = document.getElementById('new-quote-btn');

        if (!quoteDisplay || !quoteAuthor || !newQuoteButton) return;

        const quotes = [
            { text: 'ابدأ من حيث أنت. استخدم ما لديك. افعل ما تستطيع.', author: 'آرثر آش' },
            { text: 'النجاح هو مجموع جهود صغيرة تتكرر يومًا بعد يوم.', author: 'روبرت كولير' },
            { text: 'لا تنتظر الفرصة، اصنعها.', author: 'مثل شائع' },
            { text: 'التعلّم لا يرهق العقل أبدًا.', author: 'ليوناردو دا فينشي' },
            { text: 'من جدّ وجد، ومن زرع حصد.', author: 'مثل عربي' },
        ];

        function setQuote(quote) {
            quoteDisplay.textContent = '"' + quote.text + '"';
            quoteAuthor.textContent = '- ' + quote.author;
        }

        newQuoteButton.addEventListener('click', function () {
            const currentText = quoteDisplay.textContent.replace(/^"|"$/g, '');
            let next = quotes[Math.floor(Math.random() * quotes.length)];

            if (quotes.length > 1) {
                let guard = 0;
                while (next.text === currentText && guard < 10) {
                    next = quotes[Math.floor(Math.random() * quotes.length)];
                    guard++;
                }
            }

            setQuote(next);
        });
    });
</script>
@endpush

<style>
    .shadow-2xl { box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15); }
    .main-logo { width: 320px; height: 320px; object-fit: cover; border: 15px solid white; transition: 0.5s ease; }
    .main-logo:hover { transform: scale(1.05) rotate(2deg); }
    .quote-box { background: linear-gradient(to bottom left, #ffffff, #f9f9f9); border-color: #eee !important; }
    .animate-fade-in { animation: fadeIn 1s ease-out; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .hover-rotate:hover i { transform: rotate(180deg); transition: 0.5s; }
</style>
@endsection