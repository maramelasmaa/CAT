@extends('layouts.manager')

@section('title', 'تفاصيل المدرّس')

@section('content')

<div class="max-w-2xl mx-auto rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <h2 class="text-2xl font-bold text-[#003366] mb-6">تفاصيل المدرّس</h2>

    <div class="space-y-4 text-sm">

        <div>
            <p class="text-gray-500 mb-1">الاسم</p>
            <p class="font-medium text-[#003366]">{{ $tutor->name }}</p>
        </div>

        <div>
            <p class="text-gray-500 mb-1">رقم الهاتف</p>
            <p class="font-medium">{{ $tutor->phone ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500 mb-1">التخصص</p>
            <p class="font-medium">{{ $tutor->specialization ?? '-' }}</p>
        </div>

        <div>
            <p class="text-gray-500 mb-1">المعرّف (ID)</p>
            <p class="font-medium">{{ $tutor->id }}</p>
        </div>

        <div>
            <p class="text-gray-500 mb-1">تاريخ الإضافة</p>
            <p class="font-medium">{{ $tutor->created_at->format('Y-m-d / H:i') }}</p>
        </div>

        <div>
            <p class="text-gray-500 mb-1">آخر تحديث</p>
            <p class="font-medium">{{ $tutor->updated_at->format('Y-m-d / H:i') }}</p>
        </div>

    </div>

    <div class="mt-6 flex items-center justify-between">

        <a href="{{ route('manager.tutors.edit', $tutor->id) }}"
           class="rounded-lg bg-yellow-500 px-4 py-2 text-sm text-white hover:bg-yellow-600">
            تعديل
        </a>

        <form action="{{ route('manager.tutors.destroy', $tutor->id) }}"
              method="POST"
              onsubmit="return confirm('هل أنت متأكد من حذف هذا المدرّس؟');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="rounded-lg bg-red-600 px-4 py-2 text-sm text-white hover:bg-red-700">
                حذف
            </button>
        </form>

        <a href="{{ route('manager.tutors.index') }}"
           class="rounded-lg bg-gray-300 px-4 py-2 text-sm hover:bg-gray-400">
            رجوع
        </a>
    </div>

</div>

@endsection
