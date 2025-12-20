@extends('layouts.student')

@section('title', 'المراكز التدريبية')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h3 class="fw-bold text-dark mb-0">المراكز التدريبية المعتمدة</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                <li class="breadcrumb-item active">المراكز</li>
            </ol>
        </nav>
    </div>

    @if($centers->isEmpty())
        <div class="text-center py-5">
            <div class="display-1 text-muted opacity-25 mb-3"><i class="bi bi-building"></i></div>
            <h5 class="text-muted">لا توجد مراكز تدريبية مضافة حالياً</h5>
        </div>
    @else
        <div class="row g-4">
            @foreach($centers as $center)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100 transition-hover">
                        <div class="card-body p-4 text-center">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-building-check text-primary fs-2"></i>
                            </div>
                            <h5 class="fw-bold text-dark mb-2">{{ $center->name }}</h5>
                            <p class="text-muted small mb-4">
                                <i class="bi bi-geo-alt-fill text-danger me-1"></i> {{ $center->location }}
                            </p>
                            <a href="{{ route('student.centers.show', $center) }}" class="btn btn-primary w-100 rounded-pill py-2">
                                استكشاف الدورات <i class="bi bi-arrow-left ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .transition-hover { transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .transition-hover:hover { transform: translateY(-10px); box-shadow: 0 1rem 3rem rgba(0,0,0,.1) !important; }
</style>
@endsection