@extends('layouts.admin')

@section('title', 'إدارة مديري المراكز')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-6 shadow-sm">

    {{-- HEADER --}}
    <div class="flex flex-wrap items-center justify-between gap-4 border-b border-gray-200 pb-4">
        <h2 class="text-xl font-bold text-[#003366]">مديرو المراكز</h2>

        <a href="{{ route('centerManagers.create') }}"
           class="flex items-center gap-2 rounded-lg bg-[#1E90FF] px-5 py-2.5 text-sm font-medium text-white shadow-sm hover:bg-[#0077E6]">
            <span class="material-symbols-outlined">add</span>
            إضافة مدير مركز جديد
        </a>
    </div>

    {{-- TABLE --}}
    <div class="mt-4 overflow-x-auto">
        <table class="w-full text-right text-sm text-[#333333]">
            <thead class="border-b-2 border-gray-200 text-xs uppercase text-gray-500">
                <tr>
                    <th class="px-6 py-3">الاسم</th>
                    <th class="px-6 py-3">البريد الإلكتروني</th>
                    <th class="px-6 py-3">المركز</th>
                    <th class="px-6 py-3">الإجراءات</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($managers as $manager)
                <tr class="border-b bg-white hover:bg-gray-50">

                    <td class="px-6 py-4 font-medium">{{ $manager->name }}</td>

                    <td class="px-6 py-4">{{ $manager->email }}</td>

                    <td class="px-6 py-4">
                        {{ $manager->center->name ?? '—' }}
                    </td>

                    <td class="flex items-center gap-2 px-6 py-4">
                        <a href="{{ route('centerManagers.edit', $manager) }}"
                           class="p-2 text-gray-500 hover:text-[#0077E6]">
                            <span class="material-symbols-outlined text-xl">edit</span>
                        </a>

                        <form action="{{ route('centerManagers.destroy', $manager) }}" 
                              method="POST" 
                              onsubmit="return confirm('هل أنت متأكد؟');">
                            @csrf
                            @method('DELETE')
                            <button class="p-2 text-gray-500 hover:text-red-500">
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
