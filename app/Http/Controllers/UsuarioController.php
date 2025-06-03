<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\CadastroFormRequest;
use App\Http\Requests\UsuarioFormRequest;

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

    public function logar(Request $request)
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
        $novoUsuario->isAdmin = (bool) $request->role;
        $novoUsuario->save();
        return redirect()->route('usuario.index')->with(['success' => "Novo usuário cadastrado no sistema"]);
    }

    public function edit($id)
    {
        $user = User::find($id);
        dd("Editar Usuário", $user);
        return view('usuario.gerenciar',['user' => $user]);
    }

    public function update(Request $request)
    {
        dd("Atualizar Usuário", $request->usuario);
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        dd("Deletar Usuário", $id);
    }
}
