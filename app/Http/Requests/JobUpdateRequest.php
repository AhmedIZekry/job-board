<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|string|exists:users,id',
            'title'=>'sometimes|nullable|string',
            'location'=>'sometimes|nullable|string',
            'description'=>'sometimes|nullable|string',
            'salary'=>'sometimes|nullable|numeric',
            'experience'=>'sometimes|nullable|string|in:entry,intermediate,senior',
            'category'=>'sometimes|nullable|string|in:IT,Finance,Accounting,Marketing,Sales,Programming'
        ];
    }
}
