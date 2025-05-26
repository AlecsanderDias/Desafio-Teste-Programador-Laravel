@extends('home')

@section('titulo', "Cadastro")

@section('conteudo')
    <form class="py-3" action="{{ route('cadastrar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nome (máximo 30 caracteres): </label>
            <input class="form-control" type="text" id="name" name="name" maxlength="30">
        </div>
        <div class="form-group">
            <label for="email">Email (máximo 30 caracteres): </label>
            <input class="form-control" type="email" id="email" name="email" maxlength="30">
        </div>
        <div class="form-group">
            <label for="password">Senha (máximo 30 caracteres): </label>
            <input class="form-control" type="password" id="password" name="password" maxlength="30">
        </div>
        <button class="btn btn-primary" type="submit">Criar</button>
    </form>
    <p>Voltar para o <a href="{{  route('login') }}">login</a></p>
@endsection