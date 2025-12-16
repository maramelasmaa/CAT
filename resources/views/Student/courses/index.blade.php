@extends('layouts.student')

@section('title', 'كل الدورات')

@section('content')
<h3 class="fw-bold mb-4">جميع الدورات</h3>

<table class="table table-bordered">
<thead>
<tr>
    <th>الدورة</th>
    <th>المركز</th>
    <th>المدرب</th>
</tr>
</thead>
<tbody>
@foreach($courses as $course)
<tr>
    <td>
        <a href="{{ route('student.courses.show', $course) }}">
            {{ $course->title }}
        </a>
    </td>
    <td>{{ $course->center->name }}</td>
    <td>{{ $course->tutor->name ?? '-' }}</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
