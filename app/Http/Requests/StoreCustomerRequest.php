<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|string|min:3|max:255',
            'last_name' => 'nullable|string|min:2|max:255',
            'cpf' => 'required|string|unique:customers,cpf|size:11',
            'email' => 'required|string|unique:customers,email',
            'phone_number' => 'required|string|unique:customers,phone_number',
            'date_of_birth' => 'required|date',
            'license_time' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'first_name' => [
                'required' => 'O campo `nome` é obrigatório',
                'string' => 'O campo `nome` deve ser uma string',
                'min' => 'O campo `nome` deve ter no mínimo 3 caractéres',
                'max' => 'O campo `nome` deve ter no máximo 255 caractéres',
            ],
            'last_name' => [
                'string' => 'O campo `sobrenome` deve ser uma string',
                'min' => 'O campo `sobrenome` deve ter no mínimo 3 caractéres',
                'max' => 'O campo `sobrenome` deve ter no máximo 255 caractéres',
            ],
            'cpf' => [
                'required' => 'O campo `cpf` é obrigatório',
                'string' => 'O campo `cpf` deve ser uma string',
                'unique' => 'O campo `cpf` precisa ser único',
                'size' => 'O campo `cpf` precisa conter 11 dígitos',
            ],
            'email' => [
                'required' => 'O campo `email` é obrigatório',
                'string' => 'O campo `email` deve ser uma string',
                'unique' => 'O campo `email` precisa ser único',
            ],
            'phone_number' => [
                'required' => 'O campo `telefone` é obrigatório',
                'string' => 'O campo `telefone` deve ser uma string',
                'unique' => 'O campo `telefone` precisa ser único',
            ],
            'date_of_birth' => [
                'required' => 'O campo `data de nascimento` é obrigatório',
                'date' => 'O campo `data de nascimento` precisa ser uma data válida',
            ],
            'license_time' => [
                'required' => 'O campo `tempo de habilitação` é obrigatório',
                'integer' => 'O campo `tempo de habilitação` deve ser um inteiro',
            ],
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
