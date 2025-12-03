@extends('layouts.manager')

@section('title', 'لوحة التحكم')

@section('content')

<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">عدد الدورات</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $coursesCount }}</p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">عدد المدرسين</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $tutorsCount }}</p>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base text-gray-600">طلبات التسجيل المعلقة</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $pendingEnrollments }}</p>
    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">إجمالي الطلبات المقبولة</h3>
        <canvas id="approvedChart"></canvas>
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">نسبة المقاعد لكل دورة</h3>
        <canvas id="capacityChart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const approvedCtx = document.getElementById('approvedChart').getContext('2d');
new Chart(approvedCtx, {
    type: 'doughnut',
    data: {
        labels: ['مقبولة', 'معلقة'],
        datasets: [{
            data: [{{ $approvedEnrollments }}, {{ $pendingEnrollments }}],
            backgroundColor: ['#1E90FF', '#003366']
        }]
    }
});

const capacityCtx = document.getElementById('capacityChart').getContext('2d');
new Chart(capacityCtx, {
    type: 'bar',
    data: {
        labels: {!! json_encode($coursesCapacity->pluck('title')) !!},
        datasets: [
            {
                label: 'السعة الكاملة',
                data: {!! json_encode($coursesCapacity->pluck('capacity')) !!},
                backgroundColor: '#1E90FF'
            },
            {
                label: 'المقاعد المتاحة',
                data: {!! json_encode($coursesCapacity->pluck('available_seats')) !!},
                backgroundColor: '#003366'
            }
        ]
    },
    options: {
        responsive: true,
        scales: { y: { beginAtZero: true } }
    }
});
</script>

@endsection
