@extends('layouts.manager')

@section('title', 'التقييمات')

@section('content')

<div class="space-y-6">

    @php
        $hasFilters = (string) request('q') !== '' || (request('type') && request('type') !== 'all');
    @endphp

    @unless($hasFilters)
        {{-- Header Summary --}}
        <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-xl font-extrabold text-[#003366]">{{ $center->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">ملخص التقييمات الخاصة بمركزك فقط</p>
                </div>

                <div class="flex items-center gap-6">
                    <div class="text-right">
                        <div class="text-xs text-gray-500">متوسط تقييم المركز</div>
                        <div class="text-2xl font-extrabold text-[#003366]">{{ number_format((float)($center->ratings_avg_rating ?? 0), 1) }} / 5</div>
                        <div class="text-sm text-gray-500">({{ $center->ratings_count ?? 0 }}) تقييم</div>
                    </div>

                    <div class="h-10 w-px bg-gray-200"></div>

                    <div class="text-right">
                        <div class="text-xs text-gray-500">الدورات</div>
                        <div class="text-2xl font-extrabold text-[#003366]">{{ $courses->count() }}</div>
                    </div>

                    <div class="h-10 w-px bg-gray-200"></div>

                    <div class="text-right">
                        <div class="text-xs text-gray-500">المدربون</div>
                        <div class="text-2xl font-extrabold text-[#003366]">{{ $tutors->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    @endunless

    {{-- Search + Filters --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <form method="GET" action="{{ route('manager.ratings.index') }}" class="flex flex-col lg:flex-row lg:items-center gap-3">
            <div class="flex-1">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="ابحث باسم الطالب / الدورة / المدرب / تعليق"
                    class="w-full rounded-xl border border-gray-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#1E90FF]/40"
                />
            </div>

            <div class="w-full lg:w-56">
                <select
                    name="type"
                    class="w-full rounded-xl border border-gray-300 px-3 py-2 text-sm bg-white bg-none appearance-auto focus:outline-none focus:ring-2 focus:ring-[#1E90FF]/40"
                >
                    <option value="all" {{ request('type', 'all') === 'all' ? 'selected' : '' }}>الكل</option>
                    <option value="center" {{ request('type') === 'center' ? 'selected' : '' }}>المركز</option>
                    <option value="course" {{ request('type') === 'course' ? 'selected' : '' }}>الدورات</option>
                    <option value="tutor" {{ request('type') === 'tutor' ? 'selected' : '' }}>المدربون</option>
                </select>
            </div>

            <div class="flex items-center gap-2">
                <button
                    type="submit"
                    class="rounded-xl bg-[#1E90FF] px-4 py-2 text-sm font-semibold text-white hover:bg-[#1E90FF]/90"
                >
                    بحث
                </button>

                @if(request('q') || (request('type') && request('type') !== 'all'))
                    <a
                        href="{{ route('manager.ratings.index') }}"
                        class="rounded-xl border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50"
                    >
                        مسح
                    </a>
                @endif
            </div>
        </form>
    </div>

    @unless($hasFilters)
        {{-- Summaries Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#003366] mb-4">ملخص تقييمات الدورات</h3>

                @if($courses->isEmpty())
                    <p class="text-sm text-gray-500">لا توجد دورات لهذا المركز.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-right text-gray-500 border-b">
                                    <th class="py-2">الدورة</th>
                                    <th class="py-2">المتوسط</th>
                                    <th class="py-2">التقييمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($courses as $course)
                                    <tr class="border-b last:border-0">
                                        <td class="py-3 font-semibold">{{ $course->title }}</td>
                                        <td class="py-3">{{ number_format((float)($course->ratings_avg_rating ?? 0), 1) }} / 5</td>
                                        <td class="py-3">{{ $course->ratings_count ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <h3 class="text-lg font-bold text-[#003366] mb-4">ملخص تقييمات المدربين</h3>

                @if($tutors->isEmpty())
                    <p class="text-sm text-gray-500">لا يوجد مدربون لهذا المركز.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="text-right text-gray-500 border-b">
                                    <th class="py-2">المدرب</th>
                                    <th class="py-2">المتوسط</th>
                                    <th class="py-2">التقييمات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tutors as $tutor)
                                    <tr class="border-b last:border-0">
                                        <td class="py-3 font-semibold">{{ $tutor->name }}</td>
                                        <td class="py-3">{{ number_format((float)($tutor->ratings_avg_rating ?? 0), 1) }} / 5</td>
                                        <td class="py-3">{{ $tutor->ratings_count ?? 0 }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    @endunless

    {{-- Unified Ratings Table --}}
    <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
        <div class="mb-4">
            <h3 class="text-lg font-bold text-[#003366]">كل التقييمات (المركز + الدورات + المدربين)</h3>
            <div class="text-sm text-gray-500">
                {{ $ratings->total() }} سجل
                @if(request('q'))
                    <span class="text-gray-400">—</span>
                    <span class="font-semibold text-gray-600">بحث:</span>
                    <span class="text-gray-600">{{ request('q') }}</span>
                @endif
                @if(request('type') && request('type') !== 'all')
                    <span class="text-gray-400">—</span>
                    <span class="font-semibold text-gray-600">النوع:</span>
                    <span class="text-gray-600">
                        {{ request('type') === 'center' ? 'المركز' : (request('type') === 'course' ? 'الدورات' : 'المدربون') }}
                    </span>
                @endif
            </div>
        </div>

        @if($ratings->total() === 0)
            <p class="text-sm text-gray-500">لا توجد تقييمات مطابقة.</p>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="text-right text-gray-500 border-b">
                            <th class="py-2">التاريخ</th>
                            <th class="py-2">الطالب</th>
                            <th class="py-2">النوع</th>
                            <th class="py-2">المستهدف</th>
                            <th class="py-2">التقييم</th>
                            <th class="py-2">ملاحظة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ratings as $rating)
                            @php
                                $typeLabel = 'غير معروف';
                                $itemLabel = '—';

                                if ($rating->rateable_type === \App\Models\Center::class) {
                                    $typeLabel = 'مركز';
                                    $itemLabel = $center->name;
                                } elseif ($rating->rateable_type === \App\Models\Course::class) {
                                    $typeLabel = 'دورة';
                                    $itemLabel = $courseTitleById[$rating->rateable_id] ?? '—';
                                } elseif ($rating->rateable_type === \App\Models\Tutor::class) {
                                    $typeLabel = 'مدرب';
                                    $itemLabel = $tutorNameById[$rating->rateable_id] ?? '—';
                                }

                                $badgeClass = $typeLabel === 'مركز' ? 'bg-blue-100 text-blue-700'
                                    : ($typeLabel === 'دورة' ? 'bg-emerald-100 text-emerald-700' : 'bg-amber-100 text-amber-700');
                            @endphp

                            <tr class="border-b last:border-0 align-top">
                                <td class="py-3 text-gray-500 whitespace-nowrap">{{ $rating->created_at?->format('Y-m-d H:i') }}</td>
                                <td class="py-3 font-semibold whitespace-nowrap">{{ $rating->user->name ?? 'طالب' }}</td>
                                <td class="py-3">
                                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $badgeClass }}">
                                        {{ $typeLabel }}
                                    </span>
                                </td>
                                <td class="py-3 font-semibold">{{ $itemLabel }}</td>
                                <td class="py-3 font-extrabold text-[#003366] whitespace-nowrap">{{ $rating->rating }} / 5</td>
                                <td class="py-3 text-gray-600">{{ $rating->comment ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $ratings->links() }}
            </div>
        @endif
    </div>

</div>

@endsection
