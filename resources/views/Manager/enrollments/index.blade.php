@extends('layouts.manager')

@section('title', 'طلبات التسجيل')

@section('content')
<div class="max-w-6xl mx-auto">
    {{-- Header and Counter removed as requested --}}

    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <table class="w-full text-right border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100">
                    <th class="p-4 font-semibold text-gray-600">الطالب</th>
                    <th class="p-4 font-semibold text-gray-600">الدورة</th>
                    <th class="p-4 font-semibold text-gray-600">طريقة الدفع</th>
                    <th class="p-4 font-semibold text-gray-600">الإثبات</th>
                    <th class="p-4 font-semibold text-gray-600 text-center">الإجراء</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                @forelse($enrollments as $enrollment)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4">
                            <div class="font-medium text-gray-900">{{ $enrollment->user->name }}</div>
                            <div class="text-xs text-gray-500">{{ $enrollment->user->email }}</div>
                        </td>
                        <td class="p-4 text-gray-700">{{ $enrollment->course->title }}</td>
                        <td class="p-4">
                            <span class="px-2 py-1 text-xs rounded-md {{ $enrollment->payment_type === 'bank' ? 'bg-purple-50 text-purple-700' : 'bg-orange-50 text-orange-700' }}">
                                {{ $enrollment->payment_type === 'bank' ? 'تحويل بنكي' : 'نقدي' }}
                            </span>
                        </td>
                        <td class="p-4 text-center">
                            @if($enrollment->payment_proof)
                                <a href="{{ asset('storage/'.$enrollment->payment_proof) }}" 
                                   target="_blank" 
                                   class="text-blue-600 hover:text-blue-800 inline-flex items-center gap-1 text-sm font-medium">
                                   <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                   عرض
                                </a>
                            @else
                                <span class="text-gray-400">—</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <form method="POST" action="{{ route('manager.enrollments.approve', $enrollment) }}">
                                    @csrf @method('PATCH')
                                    <button class="bg-green-100 text-green-700 hover:bg-green-200 px-4 py-1.5 rounded-lg text-sm transition font-bold">قبول</button>
                                </form>

                                <form method="POST" action="{{ route('manager.enrollments.decline', $enrollment) }}">
                                    @csrf @method('PATCH')
                                    <button class="bg-red-100 text-red-700 hover:bg-red-200 px-4 py-1.5 rounded-lg text-sm transition font-bold">رفض</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500 italic">لا توجد طلبات تسجيل حالياً</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection