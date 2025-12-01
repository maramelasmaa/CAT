<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'schedule' => ['required', 'string', 'max:255'],
            'capacity' => ['required', 'integer', 'min:0'],
            'available_seats' => ['required', 'integer', 'min:0'],
            'center_id' => ['required', 'integer', 'exists:centers,id'],
            'tutor_id' => ['required', 'integer', 'exists:tutors,id'],
        ];
    }
}
