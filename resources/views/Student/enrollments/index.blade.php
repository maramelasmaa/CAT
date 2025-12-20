@extends('layouts.student')

@section('title', 'سجل التسجيلات')

@section('content')
<div class="container py-4">
    
    <div class="row g-3 mb-5">
        <div class="col-md-4">
            <div class="d-flex align-items-center p-4 bg-white rounded-4 shadow-sm border-0">
                <div class="icon-box bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3">
                    <i class="bi bi-mortarboard fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">إجمالي الدورات</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $enrollments->count() }}</h4>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="d-flex align-items-center p-4 bg-white rounded-4 shadow-sm border-0">
                <div class="icon-box bg-success bg-opacity-10 text-success rounded-circle p-3 me-3">
                    <i class="bi bi-patch-check fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">الدورات المقبولة</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $enrollments->where('status', 'approved')->count() }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="d-flex align-items-center p-4 bg-white rounded-4 shadow-sm border-0">
                <div class="icon-box bg-warning bg-opacity-10 text-warning rounded-circle p-3 me-3">
                    <i class="bi bi-hourglass-split fs-3"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small">بانتظار المراجعة</h6>
                    <h4 class="fw-bold mb-0 text-dark">{{ $enrollments->where('status', 'pending')->count() }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="fw-bold mb-0"><i class="bi bi-list-stars text-primary me-2"></i>تفاصيل التسجيلات</h5>
            <div class="badge bg-light text-dark border fw-normal py-2 px-3 rounded-pill">
                آخر تحديث: {{ now()->format('Y-m-d') }}
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3 text-secondary small fw-bold text-uppercase">الدورة التدريبية</th>
                        <th class="py-3 text-secondary small fw-bold text-uppercase">المركز</th>
                        <th class="py-3 text-secondary small fw-bold text-uppercase">نوع الدفع</th>
                        <th class="py-3 text-secondary small fw-bold text-uppercase text-center">حالة الطلب</th>
                        <th class="py-3 text-secondary small fw-bold text-uppercase text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                        <tr>
                            <td class="ps-4 py-4">
                                <div class="fw-bold text-dark">{{ $enrollment->course?->title }}</div>
                                <div class="text-muted small">ID: #ENR-{{ $enrollment->id }}</div>
                            </td>
                            <td>
                                <span class="badge bg-light text-secondary border px-2 py-1">
                                    <i class="bi bi-building me-1"></i> {{ $enrollment->course?->center?->name }}
                                </span>
                            </td>
                            <td>
                                @if($enrollment->payment_type === 'on_campus')
                                    <div class="d-flex align-items-center text-info">
                                        <i class="bi bi-cash-stack me-2 fs-5"></i>
                                        <span class="small fw-medium">نقدي في المركز</span>
                                    </div>
                                @else
                                    <div class="d-flex align-items-center text-primary">
                                        <i class="bi bi-bank me-2 fs-5"></i>
                                        <span class="small fw-medium">تحويل بنكي</span>
                                    </div>
                                @endif
                            </td>
                            <td class="text-center">
                                @php
                                    $statusLabels = [
                                        'pending' => ['bg' => 'warning', 'text' => 'قيد الانتظار'],
                                        'approved' => ['bg' => 'success', 'text' => 'تم القبول'],
                                        'rejected' => ['bg' => 'danger', 'text' => 'مرفوض'],
                                    ];
                                    $current = $statusLabels[$enrollment->status] ?? $statusLabels['pending'];
                                @endphp
                                <span class="badge rounded-pill bg-{{ $current['bg'] }} px-3 py-2">
                                    {{ $current['text'] }}
                                </span>
                            </td>
                            <td class="text-center pe-4">
                                <a href="{{ route('student.courses.show', $enrollment->course_id) }}" 
                                   class="btn btn-sm btn-light border rounded-3 text-primary fw-bold px-3">
                                    عرض التفاصيل
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <p class="text-muted mb-0 fs-5">لا يوجد سجلات تدريبية حالياً</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .icon-box { width: 56px; height: 56px; display: flex; align-items: center; justify-content: center; }
    .table thead th { border-top: 0; border-bottom-width: 1px; font-size: 0.75rem; }
    .card { background-color: #ffffff; }
    .badge { font-weight: 600; }
</style>
@endsection