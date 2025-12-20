@extends('layouts.student')

@section('title', $center->name)

@section('content')
<div class="mb-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.centers.index') }}">المراكز</a></li>
            <li class="breadcrumb-item active">{{ $center->name }}</li>
        </ol>
    </nav>
    <h2 class="fw-bold">دورات {{ $center->name }}</h2>
</div>

<div class="row justify-content-center mb-5">
    <div class="col-md-7">
        <form action="{{ route('student.centers.courses.search', $center) }}" method="GET">
            <div class="input-group shadow-sm rounded-4 border-0 bg-white p-2">
                <input type="text" name="q" class="form-control border-0 shadow-none px-4"
                       placeholder="ابحث عن دورة بالاسم داخل هذا المركز..."
                       value="{{ request('q') }}"
                       style="font-size: 0.95rem;">

                <button class="btn btn-primary rounded-3 px-4 shadow-sm" type="submit">
                    <i class="bi bi-search me-1"></i> بحث
                </button>
            </div>
        </form>
    </div>
</div>

@if($center->courses->isEmpty())
    @if(request('q'))
        <div class="text-center py-5">
            <div class="mb-3">
                <i class="bi bi-emoji-frown fs-1 text-muted"></i>
            </div>
            <h5 class="text-secondary fw-bold">لم نجد أي دورات تطابق بحثك داخل هذا المركز</h5>
            <p class="text-muted small">حاول كتابة اسم دورة آخر أو تصفح جميع الدورات</p>
            <a href="{{ route('student.centers.show', $center) }}" class="btn btn-outline-primary btn-sm rounded-pill px-4 mt-2">
                عرض كل الدورات
            </a>
        </div>
    @else
        <div class="alert bg-white border-0 shadow-sm text-center py-5 rounded-4">
            <p class="mb-0 text-muted fs-5">لا توجد دورات تدريبية نشطة في هذا المركز حالياً</p>
        </div>
    @endif
@else
    <div class="row g-4">
        @foreach($center->courses as $course)
            <div class="col-lg-4 col-md-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="position-relative">
                        <div class="bg-primary py-4 rounded-top-4 text-center">
                            <i class="bi bi-code-square display-4 text-white"></i>
                        </div>
                        <span class="position-absolute top-0 start-0 m-3 badge bg-white text-dark shadow-sm">
                            <i class="bi bi-people me-1 text-primary"></i> {{ $course->available_seats }} مقعد متبقي
                        </span>
                    </div>
                    
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3 text-dark">{{ $course->title }}</h5>
                        
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-person-circle text-muted me-2"></i>
                            <span class="text-secondary small">المدرب: <strong>{{ $course->tutor->name ?? 'غير محدد' }}</strong></span>
                        </div>

                        <div class="p-3 bg-light rounded-3 mb-4">
                            <div class="d-flex justify-content-between small mb-1">
                                <span class="text-muted">الحالة</span>
                                <span class="text-success fw-bold">متاح للتسجيل</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-success" style="width: 75%"></div>
                            </div>
                        </div>

                        <a href="{{ route('student.courses.show', $course) }}" 
                           class="btn btn-outline-primary w-100 rounded-3 fw-bold transition-all">
                            عرض التفاصيل والتسجيل
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection