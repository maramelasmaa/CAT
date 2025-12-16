@extends('layouts.student')

@section('title', 'تسجيلاتي')

@section('content')

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($enrollments->isEmpty())
    <div class="alert alert-warning">لا توجد تسجيلات حالياً</div>
@else
    <div class="row g-4">
        @foreach($enrollments as $enrollment)
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">

                        <h5 class="fw-bold">
                            {{ $enrollment->course?->title ?? 'الدورة غير متاحة' }}
                        </h5>

                        <p>
                            <strong>المركز:</strong>
                            {{ $enrollment->course?->center?->name }}
                        </p>

                        <p>
                            <strong>الحالة:</strong>
                            @switch($enrollment->status)
                                @case('pending') <span class="badge bg-warning text-dark">قيد المراجعة</span> @break
                                @case('approved') <span class="badge bg-success">مقبول</span> @break
                                @case('rejected') <span class="badge bg-danger">مرفوض</span> @break
                                @case('expired') <span class="badge bg-secondary">منتهي</span> @break
                            @endswitch
                        </p>

                        <p>
                            <strong>طريقة الدفع:</strong>
                            {{ $enrollment->payment_type === 'on_campus' ? 'دفع في المركز' : 'تحويل بنكي' }}
                        </p>

                        @if($enrollment->reservation_expiry)
                            <p class="text-danger small">
                                ينتهي الحجز:
                                {{ $enrollment->reservation_expiry->format('Y-m-d H:i') }}
                            </p>
                        @endif

                        @if(in_array($enrollment->status, ['pending','approved']))
                            <a href="{{ route('student.courses.show', $enrollment->course) }}"
                               class="btn btn-outline-primary btn-sm">
                                عرض الدورة
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection