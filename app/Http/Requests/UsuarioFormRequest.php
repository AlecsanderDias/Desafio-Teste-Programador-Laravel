<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
            'email' => 'required|unique:users,email|min:5|max:30',
            'password' => 'required|min:5|max:30|confirmed',
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
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha precisa de pelo menos 5 caracteres',
            'password.max' => 'O campo senha pode ter no máximo 30 caracteres',
            'password.confirmed' => 'A senha confirmada está incorreta',
            'role' => 'Valor inválido para o campo cargo'
        ];
    }
}
