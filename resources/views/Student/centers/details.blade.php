@extends('layouts.student')

@section('title', $center->name)

@section('content')

<h3 class="fw-bold mb-4">دورات {{ $center->name }}</h3>

@if($center->courses->isEmpty())
    <div class="alert alert-info text-center">
        لا توجد دورات حالياً في هذا المركز
    </div>
@else
    <div class="row g-4">
        @foreach($center->courses as $course)
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold">{{ $course->title }}</h5>

                        <p class="text-muted">
                            المدرب: {{ $course->tutor->name ?? 'غير محدد' }}
                        </p>

                        <p>
                            المقاعد المتاحة:
                            <strong>{{ $course->available_seats }}</strong>
                        </p>

                        <a href="{{ route('student.courses.show', $course) }}"
                           class="btn btn-outline-primary w-100">
                            تفاصيل الدورة
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@endsection
