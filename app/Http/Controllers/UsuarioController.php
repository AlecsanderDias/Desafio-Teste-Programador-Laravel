<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function create() {
        return view('usuario.cadastro');
    }

    public function store(Request $request) {
        $usuario = new Usuario($request->all());
        $usuario->cargo = 0;
        $usuario->save();
        return redirect()->route('tarefa.index');
    }

    public function logar(Request $request) {
        return view('usuario.login');
    }

    public function login(Request $request) {
        $usuario = Usuario::where([
            ['email', '=', $request->email],
            ['senha', '=', $request->senha] 
            ])->get();
        dd($usuario);
        return route('usuario.index');
    }

    public function logout($id) {

    }
}
