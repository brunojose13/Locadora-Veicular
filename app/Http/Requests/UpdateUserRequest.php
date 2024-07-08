<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response as Status;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string',
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'name' => [
                'required' => 'O campo `name` é obrigatório',
                'string' => 'O campo `nome` deve serdo tipo texto (string)'
            ],            
            'password' => [
                'required' => 'O campo `password` é obrigatório',
                'min' => 'A senha deve conter no mínimo 6 caractéres'
            ]
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'errors' => $validator->errors()->all()
        ], Status::HTTP_UNPROCESSABLE_ENTITY));
    }
}
