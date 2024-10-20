<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CadastrarRequest extends FormRequest
{
   /**
     * Determina se o usuário está autorizado a fazer esta requisição.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Regras de validação aplicadas à requisição.
     */
    public function rules(): array
    {
        return [
            'user_id'        => 'required',
            'nickname_user'  => 'required',
            'contact_phone'  => 'required|string',
            'discord'        => 'required',
            'payment_type'   => 'required',
        ];
    }

    /**
     * Mensagens de validação personalizadas.
     */
    public function messages(): array
    {
        return [
            'user_id.required'          => 'O ID do usuário é obrigatório.',
            'nickname_user.required'    => 'O apelido do usuário é obrigatório.',
            'contact_phone.required'    => 'O número de telefone de contato é obrigatório.',
            'contact_phone.numeric'     => 'O telefone de contato deve ser numérico.',
            'discord.required'          => 'O campo Discord é obrigatório.',
            'payment_type.required'     => 'O método de pagamento é obrigatório.',
        ];
    }
}
