<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlunoRequest extends FormRequest
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
            'fk_user_id' => 'required|exists:users,id',
            'fk_id_turma' => 'required|exists:turma,id_turma',
            'nome' => 'required|string|min:2|max:100',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'cpf' => 'required|string|max:14|unique:aluno,cpf',
            'email' => 'required|string|email|max:100|unique:aluno,email',
            'data_matricula' => 'required|date',
        ];
    }
}
