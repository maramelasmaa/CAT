@extends('layouts.manager')

@section('title', 'تفاصيل المدرس')

@section('content')

<div class="rounded-2xl bg-white p-6 shadow-sm max-w-xl">

    @if($tutor->image)
        <img src="{{ $tutor->image }}" class="w-32 h-32 rounded-lg object-cover mb-4">
    @endif

    <p class="mb-2"><span class="font-bold">الاسم:</span> {{ $tutor->name }}</p>
    <p class="mb-2"><span class="font-bold">الهاتف:</span> {{ $tutor->phone }}</p>
    <p class="mb-2"><span class="font-bold">التخصص:</span> {{ $tutor->specialization }}</p>

</div>

@endsection
