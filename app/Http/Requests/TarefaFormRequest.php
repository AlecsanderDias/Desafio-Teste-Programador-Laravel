<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaFormRequest extends FormRequest
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
            'titulo' => 'required|min:5|max:30',
            'descricao' => 'required|min:5|max:50',
            'status' => 'required|between:0,2'
        ];
    }

    public function messages() {
        return [
            'titulo.required' => 'O campo título é obrigatório',
            'titulo.min' => 'O campo título precisa de pelo menos 5 caracteres',
            'titulo.max' => 'O campo título pode ter no máximo 30 caracteres',
            'descricao.required' => 'O campo descrição é obrigatório',
            'descricao.min' => 'O campo descrição precisa de pelo menos 5 caracteres',
            'descricao.max' => 'O campo descrição pode ter no máximo 50 caracteres',
            'status.required' => 'O campo status é obrigatório',
            'status.between' => 'O campo status só aceita entre os valores entre 0 e 2',
        ];
    }
}
