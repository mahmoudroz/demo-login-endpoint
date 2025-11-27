<?php

namespace App\Http\Requests\Api\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Traits\HandleApiJsonResponse\HandleApiJsonResponseTrait;

class LoginRequest extends FormRequest
{
    use HandleApiJsonResponseTrait;

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
            'email'        => ['required', 'email', 'string', 'max:255'],
            'password'     => 'required|string|min:6|max:100',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->errorValidate($validator));
    }
}
