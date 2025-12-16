@extends('layouts.student')

@section('title', 'المراكز التدريبية')

@section('content')

<h3 class="fw-bold mb-4">المراكز التدريبية</h3>

@if($centers->isEmpty())
    <div class="alert alert-warning text-center">
        لا توجد مراكز تدريبية مضافة حالياً
    </div>
@else
    <div class="row g-4">
        @foreach($centers as $center)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $center->name }}</h5>

                        <p class="text-muted mb-3">
                            {{ $center->location }}
                        </p>

                        <a href="{{ route('student.centers.show', $center) }}"
                           class="btn btn-primary w-100">
                            عرض الدورات
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
