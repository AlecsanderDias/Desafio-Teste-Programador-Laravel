<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarUsuarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:30',
            'email' => 'required|min:5|max:30',
            'role' => 'required|boolean'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome precisa de pelo menos 5 caracteres',
            'name.max' => 'O campo nome pode ter no máximo 30 caracteres',
            'email.required' => 'O campo email é obrigatório',
            'email.unique' => 'Este email já está sendo usado',
            'email.min' => 'O campo email precisa de pelo menos 5 caracteres',
            'email.max' => 'O campo email pode ter no máximo 30 caracteres',
            'password.confirmed' => 'A senha confirmada está incorreta',
            'role' => 'Valor inválido para o campo cargo'
        ];
    }
}
