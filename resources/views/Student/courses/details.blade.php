@extends('layouts.student')

@section('title', $course->title)

@section('content')

<div class="card shadow-sm">
    <div class="card-body">

        @if($course->image)
            <img src="{{ asset('storage/'.$course->image) }}"
                 class="img-fluid rounded mb-4"
                 style="max-height:300px;object-fit:cover;">
        @endif

        <h3 class="fw-bold">{{ $course->title }}</h3>
        <p class="text-muted">{{ $course->description }}</p>

        <hr>

        <p><strong>المركز:</strong> {{ $course->center->name }}</p>
        <p><strong>المدرب:</strong> {{ $course->tutor->name ?? 'غير محدد' }}</p>
        <p><strong>الجدول:</strong> {{ $course->schedule }}</p>

        <p>
            <strong>المقاعد المتاحة:</strong>
            <span class="badge bg-{{ $course->available_seats > 0 ? 'success' : 'danger' }}">
                {{ $course->available_seats }}
            </span>
        </p>

        <hr>

        {{-- UC-04 On-campus --}}
        <h5 class="fw-bold mt-4">الدفع في المركز</h5>
        <p class="text-muted">
            سيتم حجز مقعدك لمدة <strong>3 أيام</strong>.  
            في حال عدم الدفع، يُلغى الحجز تلقائياً.
        </p>

        <form method="POST"
              action="{{ route('student.enrollments.store', $course) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="payment_type" value="on_campus">
            <button class="btn btn-success w-100"
                {{ $course->available_seats <= 0 ? 'disabled' : '' }}>
                حجز والدفع في المركز (3 أيام)
            </button>
        </form>

        <hr>

        {{-- UC-05 Bank transfer --}}
        <h5 class="fw-bold mt-4">التحويل البنكي</h5>

        <div class="alert alert-info">
            <strong>رقم حساب المركز:</strong><br>
            {{ $course->center->bank_account }}
        </div>

        <form method="POST"
              action="{{ route('student.enrollments.store', $course) }}"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="payment_type" value="bank">

            <label class="form-label">إثبات التحويل</label>
            <input type="file" name="payment_proof"
                   class="form-control mb-3" required>

            <button class="btn btn-primary w-100"
                {{ $course->available_seats <= 0 ? 'disabled' : '' }}>
                إرسال إثبات الدفع
            </button>
        </form>

    </div>
</div>

@endsection
