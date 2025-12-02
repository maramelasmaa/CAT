@extends('layouts.admin')

@section('title', 'تفاصيل المركز')

@section('content')

<div class="rounded-2xl border bg-white p-6 shadow-sm max-w-2xl">

    <div class="flex gap-6 items-start">

        {{-- Center Image --}}
        <div>
            <img src="{{ asset('images/cat-logo.png') }}"
                 class="w-24 h-24 rounded-full object-cover">
        </div>

        {{-- Details --}}
        <div class="space-y-2 flex-1">

            <h2 class="text-2xl font-bold text-[#003366]">
                {{ $center->name }}
            </h2>

            <p class="text-sm">
                <strong>الموقع:</strong> {{ $center->location }}
            </p>

            <p class="text-sm">
                <strong>الهاتف:</strong> {{ $center->phone }}
            </p>

            <p class="text-sm">
                <strong>الحساب البنكي:</strong> {{ $center->bank_account }}
            </p>

            @if($center->description)
                <p class="text-sm leading-relaxed text-gray-700 mt-2">
                    {{ $center->description }}
                </p>
            @endif

        </div>

    </div>

</div>

@endsection