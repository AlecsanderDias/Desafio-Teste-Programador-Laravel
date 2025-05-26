<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginFormRequest extends FormRequest
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
            'email' => 'required|min:5|max:30',
            'password' => 'required|min:5|max:30',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'O campo email é obrigatório',
            'email.min' => 'O campo email precisa de pelo menos 5 caracteres',
            'email.max' => 'O campo email pode ter no máximo 30 caracteres',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha precisa de pelo menos 5 caracteres',
            'password.max' => 'O campo senha pode ter no máximo 30 caracteres',
        ];
    }
}
