<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EnrollmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $enrollmentId = $this->route('enrollment');

        return [
            'student_id' => [
                'required',
                'integer',
                'exists:students,id',
                Rule::unique('enrollments')->where(function ($query) {
                    return $query->where('course_id', $this->input('course_id'));
                })->ignore($enrollmentId),
            ],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'status' => ['required', 'string', Rule::in(['pending', 'confirmed', 'expired', 'rejected'])],
            'payment_type' => ['required', 'string', Rule::in(['on_campus', 'bank_transfer'])],
            'reservation_expiry' => ['nullable', 'date'],
        ];
    }
}
