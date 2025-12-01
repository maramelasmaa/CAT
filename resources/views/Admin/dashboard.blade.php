@extends('layouts.admin')

@section('title', 'لوحة التحكم')

@section('content')

<h2 class="text-2xl font-bold text-[#003366] mb-6">لوحة التحكم</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

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

@endsection
