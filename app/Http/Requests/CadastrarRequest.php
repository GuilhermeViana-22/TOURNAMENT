<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarRequest extends FormRequest
{
    /**
     * Regras de validação aplicadas à requisição.
     */
    public function rules(): array
    {
        return [
            '_token' => 'required',
            'user_id' => 'required|string|max:255',
            'nickname_user' => 'required|string|max:255',
            'nickname_team' => 'required|string|max:255',
            'duo_name' => 'required|string|max:255',
            'contact_phone' => 'required|numeric',
            'discord' => 'required|string|max:255',
        ];
    }

    /**
     * Mensagens de validação personalizadas.
     */
    public function messages(): array
    {
        return [
            '_token.required' => 'O token de segurança é obrigatório.',
            'nickname_user.required' => 'O apelido do usuário é obrigatório.',
            'nickname_team.required' => 'O apelido do time é obrigatório.',
            'duo_name.required' => 'O nome do duo é obrigatório.',
            'contact_phone.required' => 'O número de telefone de contato é obrigatório.',
            'contact_phone.numeric' => 'O telefone de contato deve ser numérico.',
            'discord.required' => 'O campo Discord é obrigatório.',
        ];
    }
}
