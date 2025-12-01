@extends('layouts.admin')

@section('title', 'إدارة المراكز')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    <div class="flex items-center justify-between border-b pb-4">
        <h2 class="text-xl font-bold text-[#003366]">المراكز</h2>

        <a href="{{ route('centers.create') }}"
           class="flex items-center gap-2 rounded-lg bg-[#1E90FF] px-5 py-2.5 text-sm text-white hover:bg-[#0077E6]">
            <span class="material-symbols-outlined">add</span>
            إضافة مركز جديد
        </a>
    </div>

    <div class="mt-4 overflow-x-auto">
        <table class="w-full text-sm text-right">
            <thead class="border-b text-xs text-gray-500 uppercase">
                <tr>
                    <th class="px-6 py-3">الشعار</th>
                    <th class="px-6 py-3">الاسم</th>
                    <th class="px-6 py-3">الموقع</th>
                    <th class="px-6 py-3">الهاتف</th>
                    <th class="px-6 py-3">الإجراءات</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($centers as $center)
                <tr class="border-b hover:bg-gray-50">

                    <td class="px-6 py-4">
                        @if($center->image)
                            <img src="{{ asset('storage/'.$center->image) }}"
                                 class="w-10 h-10 rounded-full object-cover">
                        @else
                            —
                        @endif
                    </td>

                    <td class="px-6 py-4">{{ $center->name }}</td>
                    <td class="px-6 py-4">{{ $center->location }}</td>
                    <td class="px-6 py-4">{{ $center->phone }}</td>

                    <td class="px-6 py-4 flex gap-2">

                        <a href="{{ route('centers.show', $center) }}"
                           class="p-2 hover:text-[#1E90FF]">
                            <span class="material-symbols-outlined text-xl">visibility</span>
                        </a>

                        <a href="{{ route('centers.edit', $center) }}"
                           class="p-2 hover:text-[#0077E6]">
                            <span class="material-symbols-outlined text-xl">edit</span>
                        </a>

                        <form action="{{ route('centers.destroy', $center) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 hover:text-red-500">
                                <span class="material-symbols-outlined text-xl">delete</span>
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection
