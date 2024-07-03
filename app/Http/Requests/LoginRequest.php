<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginRequest extends FormRequest
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
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'email' => [
                'required' => 'O campo `email` é obrigatório',
                'string' => 'O campo `email` deve ser uma string',
                'email' => 'O e-mail informado deve ser válido'
            ],
            'password' => [
                'required' => 'O campo `senha` é obrigatório',
                'string' => 'O campo `senha` deve ser uma string',
                'min' => 'A senha deve conter no mínimo 6 caractéres'
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()->all()
        ], 422));
    }
}
