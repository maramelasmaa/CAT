<!-- Admin dashboard view -->
@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

    {{-- Centers Count --}}
    <div class="flex transform flex-col gap-2 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
        <div class="flex items-center justify-between">
            <p class="text-base font-medium text-[#333333]">عدد المراكز</p>
            <span class="material-symbols-outlined rounded-full bg-blue-100 p-2 text-[#1E90FF]">domain</span>
        </div>
        <p class="text-3xl font-bold text-[#003366]">{{ $centersCount }}</p>
    </div>

    {{-- Center Managers --}}
    <div class="flex transform flex-col gap-2 rounded-2xl border border-gray-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
        <div class="flex items-center justify-between">
            <p class="text-base font-medium text-[#333333]">مديرو المراكز</p>
            <span class="material-symbols-outlined rounded-full bg-blue-100 p-2 text-[#0077E6]">group</span>
        </div>
        <p class="text-3xl font-bold text-[#003366]">{{ $managersCount }}</p>
    </div>

</div>


{{-- Charts Section --}}
<div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-3">

    {{-- Bar Chart: counts --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-medium text-[#333333] mb-4">إحصائيات عامة</h3>
        <div class="h-56"><canvas id="barChart" dir="rtl"></canvas></div>
    </div>

    {{-- Pie Chart: tutors per center --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-medium text-[#333333] mb-4">توزيع المدربين حسب المركز</h3>
        <div class="h-56"><canvas id="pieChart" dir="rtl"></canvas></div>
    </div>

    {{-- Line Chart: enrollments by month --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">
        <h3 class="text-lg font-medium text-[#333333] mb-4">الاشتراكات الشهرية</h3>
        <div class="h-56"><canvas id="lineChart" dir="rtl"></canvas></div>
    </div>

</div>


{{-- Chart.js script (included inline to keep layout unchanged) --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data from controller (fallbacks)
    const centersCount = {{ isset($centersCount) ? $centersCount : 0 }};
    const managersCount = {{ isset($managersCount) ? $managersCount : 0 }};
    const tutorsCount = {{ isset($tutorsCount) ? $tutorsCount : 0 }};
    const studentsCount = {{ isset($studentsCount) ? $studentsCount : 0 }};

    const tutorsLabels = @json(isset($tutorsLabels) ? $tutorsLabels : []);
    const tutorsData = @json(isset($tutorsData) ? $tutorsData : []);

    const monthlyEnrollments = @json(isset($monthlyEnrollments) ? $monthlyEnrollments : array_fill(0,12,0));

    // Bar Chart
    (function(){
        const ctx = document.getElementById('barChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['المراكز','مديرو المراكز','المدربون','الطلبة'],
                datasets: [{
                    label: 'العدد',
                    data: [centersCount, managersCount, tutorsCount, studentsCount],
                    backgroundColor: ['#1E90FF','#0077E6','#00A2FF','#6C757D']
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: { x: { beginAtZero: true } }
            }
        });
    })();

    // Pie Chart
    (function(){
        const ctx = document.getElementById('pieChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: tutorsLabels,
                datasets: [{
                    data: tutorsData,
                    backgroundColor: tutorsLabels.map((_,i)=> ['#1E90FF','#0077E6','#00A2FF','#6C757D','#FFB547','#FF7A7A','#A78BFA'][i%7])
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { position: 'bottom' } } }
        });
    })();

    // Line Chart
    (function(){
        const ctx = document.getElementById('lineChart');
        if (!ctx) return;
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                datasets: [{
                    label: 'الاشتراكات',
                    data: monthlyEnrollments,
                    borderColor: '#1E90FF',
                    backgroundColor: 'rgba(30,144,255,0.1)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
        });
    })();

</script>

@endsection
