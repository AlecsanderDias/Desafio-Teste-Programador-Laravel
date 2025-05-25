@extends('home')

@section('titulo', "Cadastro")

@section('conteudo')
    <form action="{{ route('usuario.store') }}" method="POST">
        @csrf
        <label for="nome">Nome (máximo 30 caracteres): </label><br>
        <input type="text" id="nome" name="nome" maxlength="30"><br>
        <label for="email">Email (máximo 30 caracteres): </label><br>
        <input type="email" id="email" name="email" maxlength="30"><br>
        <label for="senha">Senha (máximo 30 caracteres): </label><br>
        <input type="password" id="senha" name="senha" maxlength="30"><br>
        <button type="submit">Criar</button>
    </form>
@endsection