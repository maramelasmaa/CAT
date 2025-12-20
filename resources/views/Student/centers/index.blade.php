@extends('layouts.student')

@section('title', 'المراكز التدريبية')

@section('content')

<div class="row mb-5 align-items-center">
    <div class="col-lg-7">
        <h2 class="fw-bold text-dark display-6 mb-2">اكتشف مراكزنا التدريبية</h2>
        <p class="text-muted fs-5">تصفح أفضل المراكز المعتمدة وابدأ رحلتك التعليمية اليوم.</p>
    </div>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-md-7">
        <form action="{{ route('student.centers.search') }}" method="GET">
            <div class="input-group shadow-sm rounded-4 border-0 bg-white p-2">
                <input type="text" name="q" class="form-control border-0 shadow-none px-4"
                       placeholder="ابحث عن مركز بالاسم..."
                       value="{{ request('q') }}"
                       style="font-size: 0.95rem;">

                <button class="btn btn-primary rounded-3 px-4 shadow-sm" type="submit">
                    <i class="bi bi-search me-1"></i> بحث
                </button>
            </div>
        </form>
    </div>
</div>

@if($centers->isEmpty())
    @if(request('q'))
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="bi bi-emoji-frown fs-1 text-muted"></i>
            </div>
            <h5 class="text-secondary fw-bold">لم نجد أي مراكز تطابق بحثك</h5>
            <p class="text-muted small">حاول كتابة اسم مركز آخر أو تصفح كافة المراكز</p>
            <a href="{{ route('student.centers.index') }}" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-2">
                عرض كل المراكز المتاحة
            </a>
        </div>
    @else
        <div class="text-center py-5 bg-white rounded-4 shadow-sm">
            <i class="bi bi-building-exclamation display-1 text-muted opacity-25"></i>
            <h5 class="mt-3 text-muted">لا توجد مراكز متاحة حالياً</h5>
        </div>
    @endif
@else
    <div class="row g-4">
        @foreach($centers as $center)
            <div class="col-xl-4 col-md-6">
                <div class="card shadow-sm border-0 h-100 overflow-hidden rounded-4">
                    <div class="center-image-container" style="height: 200px; overflow: hidden; position: relative;">
                        @if($center->image)
                            <img src="{{ asset('storage/' . $center->image) }}" class="w-100 h-100 object-fit-cover transition-img" alt="{{ $center->name }}">
                        @else
                            <div class="bg-primary bg-opacity-10 w-100 h-100 d-flex align-items-center justify-content-center">
                                <i class="bi bi-building fs-1 text-primary"></i>
                            </div>
                        @endif
                        <span class="position-absolute bottom-0 start-0 m-3 badge bg-white text-primary shadow-sm rounded-pill">
                            {{ $center->location }}
                        </span>
                    </div>

                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-3 text-dark">{{ $center->name }}</h4>
                        
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="text-muted small">
                                <i class="bi bi-mortarboard me-1"></i> {{ $center->courses_count ?? 0 }} دورة متاحة
                            </span>
                            <div class="stars text-warning small">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                            </div>
                        </div>

                        <a href="{{ route('student.centers.show', $center) }}" 
                           class="btn btn-primary w-100 py-2 rounded-3 shadow-sm">
                            استعراض الدورات <i class="bi bi-chevron-left ms-1 small"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<style>
    .card { transition: all 0.3s cubic-bezier(.25,.8,.25,1); }
    .card:hover { transform: translateY(-8px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
    .transition-img { transition: transform 0.5s ease; }
    .card:hover .transition-img { transform: scale(1.1); }
    .object-fit-cover { object-fit: cover; }
</style>
@endsection