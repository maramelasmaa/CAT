@extends('layouts.manager')

@section('title', 'تفاصيل التسجيل')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="mb-4">
        <a href="{{ route('manager.enrollments.index') }}" class="text-sm text-blue-600 hover:underline">← العودة للقائمة</a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="bg-gray-50 p-6 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-xl font-bold text-gray-800">تفاصيل طلب التسجيل</h2>
            @php
                $statusClasses = [
                    'pending' => 'bg-yellow-100 text-yellow-700',
                    'approved' => 'bg-green-100 text-green-700',
                    'declined' => 'bg-red-100 text-red-700',
                ];
            @endphp
            <span class="px-3 py-1 rounded-full text-sm font-bold {{ $statusClasses[$enrollment->status] ?? 'bg-gray-100' }}">
                {{ $enrollment->status === 'pending' ? 'قيد الانتظار' : ($enrollment->status === 'approved' ? 'مقبول' : 'مرفوض') }}
            </span>
        </div>

        <div class="p-8 space-y-6">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-500">اسم الطالب</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $enrollment->user->name }}</p>
                </div>
                <div>
                    <label class="block text-sm text-gray-500">الدورة التدريبية</label>
                    <p class="text-lg font-semibold text-gray-900">{{ $enrollment->course->title }}</p>
                </div>
                <div>
                    <label class="block text-sm text-gray-500">طريقة الدفع</label>
                    <p class="font-medium">
                        {{ $enrollment->payment_type === 'bank' ? '🏦 تحويل بنكي' : '💵 دفع نقدي بالمركز' }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm text-gray-500">إثبات الدفع</label>
                    @if($enrollment->payment_proof)
                        <a href="{{ asset('storage/'.$enrollment->payment_proof) }}" target="_blank" class="text-blue-600 font-medium hover:underline flex items-center gap-1 mt-1">
                            عرض المرفق (PDF)
                        </a>
                    @else
                        <p class="text-gray-400">لا يوجد ملف مرفق</p>
                    @endif
                </div>
            </div>

            <hr class="border-gray-100">

            <div class="flex items-center justify-end gap-3 pt-2">
                @if($enrollment->status === 'pending')
                    <form method="POST" action="{{ route('manager.enrollments.decline', $enrollment) }}" class="flex-1">
                        @csrf @method('PATCH')
                        <button class="w-full py-3 px-4 rounded-xl border-2 border-red-100 text-red-600 font-bold hover:bg-red-50 transition">
                            رفض الطلب
                        </button>
                    </form>

                    <form method="POST" action="{{ route('manager.enrollments.approve', $enrollment) }}" class="flex-1">
                        @csrf @method('PATCH')
                        <button class="w-full py-3 px-4 rounded-xl bg-green-600 text-white font-bold hover:bg-green-700 shadow-lg shadow-green-100 transition">
                            قبول وتفعيل
                        </button>
                    </form>
                @else
                    <div class="w-full bg-gray-50 text-center py-4 rounded-xl border border-dashed border-gray-200">
                        <p class="text-gray-500">تمت معالجة هذا الطلب مسبقاً.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection