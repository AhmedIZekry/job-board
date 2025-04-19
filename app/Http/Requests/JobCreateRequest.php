<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class JobCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
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
            'title'=>'required|string',
            'location'=>'required|string',
            'description'=>'required|string',
            'salary'=>'required|numeric',
            'experience'=>'required|string|in:entry,intermediate,senior',
            'category'=>'required|string|in:IT, Finance, Accounting, Marketing,Sales,Programming'
        ];
    }
}
