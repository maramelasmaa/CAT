@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')

<h2 class="text-2xl font-bold text-[#003366] mb-6">لوحة التحكم</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">

    {{-- Centers Count --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base font-medium text-gray-600">عدد المراكز</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $centersCount }}</p>
        <a href="{{ route('centers.index') }}" class="inline-block mt-4 text-sm font-medium text-[#003366] underline">إدارة المراكز</a>
    </div>

    {{-- Managers Count --}}
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <p class="text-base font-medium text-gray-600">مديرو المراكز</p>
        <p class="text-4xl font-bold text-[#003366] mt-2">{{ $managersCount }}</p>
        <a href="{{ route('centerManagers.index') }}" class="inline-block mt-4 text-sm font-medium text-[#003366] underline">إدارة مديري المراكز</a>
    </div>

</div>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">أحدث المراكز</h3>

        @if(isset($latestCenters) && $latestCenters->count())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المدينة</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($latestCenters as $center)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $center->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $center->location }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-600">لا توجد مراكز حالياً.</p>
        @endif
    </div>

    <div class="rounded-2xl bg-white p-6 shadow-sm border border-gray-200">
        <h3 class="text-lg font-bold text-[#003366] mb-4">أحدث مديري المراكز</h3>

        @if(isset($latestManagers) && $latestManagers->count())
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">الاسم</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">المركز</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($latestManagers as $manager)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ $manager->name ?? $manager->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-900">{{ optional($manager->center)->name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-sm text-gray-600">لا يوجد مديرون حالياً.</p>
        @endif
    </div>
</div>

@endsection