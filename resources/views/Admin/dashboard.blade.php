@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')

<h2 class="text-2xl font-bold text-[#003366] mb-6">لوحة التحكم</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">

    {{-- Centers Count --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base font-medium text-gray-600">عدد المراكز</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $centersCount }}</p>
    </div>

    {{-- Managers Count --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base font-medium text-gray-600">مديرو المراكز</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $managersCount }}</p>
    </div>

</div>

{{-- Graphs Section --}}
<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

    {{-- Centers per City --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">عدد المراكز حسب المدينة</h3>
        <canvas id="centersChart"></canvas>
    </div>

    {{-- Managers per Center --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">عدد المدراء لكل مركز</h3>
        <canvas id="managersChart"></canvas>
    </div>

</div>

{{-- Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Centers per City
    const centersCtx = document.getElementById('centersChart').getContext('2d');
    new Chart(centersCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($centersPerCity->pluck('city')) !!},
            datasets: [{
                label: 'عدد المراكز',
                data: {!! json_encode($centersPerCity->pluck('count')) !!},
                backgroundColor: '#1E90FF'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
                tooltip: { mode: 'index', intersect: false }
            },
            scales: {
                y: { beginAtZero: true, ticks: { stepSize: 1 } }
            }
        }
    });

    // Managers per Center
    const managersCtx = document.getElementById('managersChart').getContext('2d');
    new Chart(managersCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($managersPerCenter->pluck('center')) !!},
            datasets: [{
                data: {!! json_encode($managersPerCenter->pluck('count')) !!},
                backgroundColor: [
                    '#1E90FF','#003366','#0077E6','#00BFFF','#4682B4','#6495ED','#87CEFA','#B0C4DE'
                ]
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'right' }
            }
        }
    });
</script>

@endsection