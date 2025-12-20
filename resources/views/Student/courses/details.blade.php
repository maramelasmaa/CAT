@extends('layouts.student')

@section('title', $course->title)

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm overflow-hidden rounded-4">
                @if($course->image)
                    <img src="{{ asset('storage/'.$course->image) }}" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
                        <i class="bi bi-image text-muted display-1"></i>
                    </div>
                @endif
                
                <div class="card-body p-4 p-md-5">
                    <div class="d-flex align-items-center mb-3">
                        <span class="badge bg-soft-primary text-primary px-3 py-2 rounded-pill me-2">
                            {{ $course->center->name }}
                        </span>
                    </div>
                    <h2 class="fw-bold text-dark mb-4">{{ $course->title }}</h2>
                    <p class="text-secondary lh-lg fs-5 mb-0">{{ $course->description }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="sticky-top" style="top: 2rem;">
                <div class="card border-0 shadow-sm rounded-4 mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <span class="text-muted">المقاعد المتاحة</span>
                            <span class="fs-4 fw-bold {{ $course->available_seats > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $course->available_seats }}
                            </span>
                        </div>

                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item px-0 d-flex align-items-center">
                                <i class="bi bi-person-badge fs-4 text-primary me-3"></i>
                                <div><small class="text-muted d-block">المدرب</small><strong>{{ $course->tutor->name ?? 'غير محدد' }}</strong></div>
                            </div>
                            <div class="list-group-item px-0 d-flex align-items-center">
                                <i class="bi bi-calendar3 fs-4 text-primary me-3"></i>
                                <div><small class="text-muted d-block">الجدول الزمني</small><strong>{{ $course->schedule }}</strong></div>
                            </div>
                        </div>

                        <ul class="nav nav-pills nav-justified mb-4 bg-light p-1 rounded-pill" id="paymentTabs" role="tablist">
                            <li class="nav-item">
                                <button class="nav-link active rounded-pill" data-bs-toggle="tab" data-bs-target="#campus">دفع نقدي</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link rounded-pill" data-bs-toggle="tab" data-bs-target="#bank">تحويل بنكي</button>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="campus">
                                <p class="small text-muted mb-3">حجز مؤقت لمدة 72 ساعة للدفع داخل مقر المركز.</p>
                                <form method="POST" action="{{ route('student.enrollments.store', $course) }}">
                                    @csrf
                                    <input type="hidden" name="payment_type" value="on_campus">
                                    <button class="btn btn-success w-100 py-2 rounded-3" {{ $course->available_seats <= 0 ? 'disabled' : '' }}>حجز المقعد الآن</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="bank">
                                <div class="bg-light p-3 rounded-3 mb-3 text-center border">
                                    <small class="text-muted d-block">رقم الحساب البنكي</small>
                                    <code class="fs-6">{{ $course->center->bank_account }}</code>
                                </div>
                                <form method="POST" action="{{ route('student.enrollments.store', $course) }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="payment_type" value="bank">
                                    <div class="mb-3">
                                        <label class="form-label small fw-bold">إرفاق إيصال الدفع (PDF/Image)</label>
                                        <input type="file" name="payment_proof" class="form-control form-control-sm" required>
                                    </div>
                                    <button class="btn btn-primary w-100 py-2 rounded-3" {{ $course->available_seats <= 0 ? 'disabled' : '' }}>تأكيد التحويل</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-soft-primary { background-color: rgba(13, 110, 253, 0.1); }
    .nav-pills .nav-link.active { background-color: #fff; color: #0d6efd; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
    .nav-pills .nav-link { color: #6c757d; font-weight: 500; font-size: 0.9rem; }
</style>
@endsection