<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RatingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $ratingId = $this->route('rating');

        return [
            'enrollment_id' => [
                'required',
                'integer',
                'exists:enrollments,id',
                Rule::unique('ratings', 'enrollment_id')->ignore($ratingId),
            ],
            'course_rating' => ['required', 'integer', 'between:1,5'],
            'tutor_rating' => ['required', 'integer', 'between:1,5'],
            'center_rating' => ['required', 'integer', 'between:1,5'],
        ];
    }
}
