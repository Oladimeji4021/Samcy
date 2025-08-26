<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
               'gender' => 'required|in:male,female,other',
                'marital_status' => 'required|string',
                'dob' => 'required|date',
                'state' => 'required|string',
                'local_govt' => 'required|string',
                'address' => 'required|string',
                'nationality' => 'required|string',
                'nin' => 'required|string|unique:students,nin',
                'department' => 'required|string',
        ];
    }
}
