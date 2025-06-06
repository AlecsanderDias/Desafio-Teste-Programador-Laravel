<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\CadastroFormRequest;
use App\Http\Requests\EditarUsuarioFormRequest;
use App\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    public function cadastro()
    {
        if (!Auth::guest()) return redirect()->route('tarefa.index');
        return view('usuario.cadastro');
    }

    public function cadastrar(CadastroFormRequest $request)
    {
        $usuario = new User($request->all());
        $usuario->password = Hash::make($request->password);
        // $usuario->isAdmin = false;
        $usuario->save();
        Auth::login($usuario);
        return redirect()->route('tarefa.index')->with(['success' => 'Bem Vindo Ao Sistema!']);
    }

    public function logar()
    {
        if (!Auth::guest()) return redirect()->route('tarefa.index');
        return view('usuario.login');
    }

    public function login(LoginFormRequest $request)
    {
        $usuario = $request->only(['email', 'password']);
        if (Auth::attempt($usuario)) {
            return redirect()->route('tarefa.index')->with(['success' => 'Bem Vindo Novamente Ao Sistema!']);
        }
        return redirect()->route('login')->withErrors('Email e/ou senha incorretos!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function index()
    {
        $adminId = auth()->user()->id;
        $usuarios = User::withTrashed()->where('id', '<>', $adminId)->get();
        return view('usuario.todos', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        return view('usuario.gerenciar');
    }

    public function store(UsuarioFormRequest $request)
    {
        $novoUsuario = new User($request->all());
        $novoUsuario->password = Hash::make($request->password);
        $novoUsuario->isAdmin = $request->role;
        $novoUsuario->save();
        return redirect()->route('usuario.index')->with(['success' => "Novo usuário cadastrado no sistema"]);
    }

    public function edit($id)
    {
        $usuario = User::withTrashed()->find($id);
        return view('usuario.formulario', ['usuario' => $usuario]);
    }

    public function update(EditarUsuarioFormRequest $request, $id)
    {
        $usuario = new User($request->all());
        // dd($usuario, $usuario->attributesToArray());
        $rules = [
            'email' => Rule::unique('users')->ignore($id),
        ];
        $messages = [
            'email.unique' => 'Este email já está sendo utilizado',
        ];
        if (isset($usuario->password)) {
            $rules[] = ['password' => 'required|min:5|max:30|confirmed'];
            $messages[] = [
                'password.required' => 'O campo senha é obrigatório',
                'password.min' => 'O campo senha precisa de pelo menos 5 caracteres',
                'password.max' => 'O campo senha pode ter no máximo 30 caracteres',
                'password.confirmed' => 'A senha confirmada está incorreta'
            ];
        }
        $validar = Validator::make($request->all(), $rules, $messages);
        if ($validar->fails()) {
            return redirect()->route('usuario.edit', $id)->withErrors($validar)->withInput();
        }
        $usuario->password = Hash::make($request->password);
        $usuario->isAdmin = $request->role;
        // dd("Atualizar Usuário", $usuario, $id);
        User::find($id)->update($usuario->attributesToArray());
        return redirect()->route('usuario.index')->with(['success' => "O usuário de id => $id foi alterado com sucesso"]);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        dd("Deletar Usuário", $id);
    }
}
