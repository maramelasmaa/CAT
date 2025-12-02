@extends('layouts.admin')

@section('title', 'تفاصيل مدير مركز')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm max-w-xl">

    <h2 class="text-xl font-bold text-[#003366] mb-4">تفاصيل مدير المركز</h2>

    <p class="mb-3">
        <span class="font-medium text-gray-700">الاسم:</span>
        <span class="text-gray-900">{{ $manager->name }}</span>
    </p>

    <p class="mb-3">
        <span class="font-medium text-gray-700">البريد الإلكتروني:</span>
        <span class="text-gray-900">{{ $manager->email }}</span>
    </p>

    <p class="mb-3">
        <span class="font-medium text-gray-700">المركز:</span>
        <span class="text-gray-900">{{ $manager->center->name ?? '—' }}</span>
    </p>

    <a href="{{ route('centerManagers.index') }}"
       class="mt-4 inline-block rounded-lg bg-[#1E90FF] px-4 py-2 text-white font-medium hover:bg-[#0077E6]">
       رجوع
    </a>

</div>

@endsection