<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CenterManagerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        // Laravel will inject manager model as "manager" because of route resource names
        $manager = $this->route('manager');

        return [
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'email',
                // If updating, ignore the current manager's email
                Rule::unique('center_managers', 'email')->ignore($manager?->id),
            ],

            // Password is required only on create
            'password' => $this->isMethod('post')
                ? 'required|min:6'
                : 'nullable|min:6',

            'center_id' => 'required|exists:centers,id',
        ];
    }
}
