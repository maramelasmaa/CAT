@extends('layouts.manager')

@section('title', 'طلبات التسجيل')

@section('content')

<div class="bg-white rounded-xl shadow p-6">

<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th>الطالب</th>
            <th>الدورة</th>
            <th>الدفع</th>
            <th>الإثبات</th>
            <th>الإجراء</th>
        </tr>
    </thead>

    <tbody>
        @forelse($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->user->name }}</td>
                <td>{{ $enrollment->course->title }}</td>
                <td>{{ $enrollment->payment_type }}</td>
                <td>
                    @if($enrollment->payment_proof)
                        <a href="{{ asset('storage/'.$enrollment->payment_proof) }}" target="_blank">
                            عرض
                        </a>
                    @else
                        —
                    @endif
                </td>
                <td>
                    <form method="POST"
                          action="{{ route('manager.enrollments.approve', $enrollment) }}"
                          class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success btn-sm">قبول</button>
                    </form>

                    <form method="POST"
                          action="{{ route('manager.enrollments.decline', $enrollment) }}"
                          class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger btn-sm">رفض</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">لا توجد طلبات</td>
            </tr>
        @endforelse
    </tbody>
</table>

</div>

@endsection