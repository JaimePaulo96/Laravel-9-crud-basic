@extends('layouts.app')
@section('title', 'ComandaOn - Usuários')
@section('content')
    <h3>Listagem de Usuários</h3>
    <a href="{{ route('users.create') }}">Novo Usuário</a>

    <form action="{{route('users.index')}}" method="get">
        <input type="text" name="search" placeholder="Pesquisar">
        <button>Pesquisar</button>
    </form>


    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->occupation }}
                <br>
                <a href="{{ route('users.show', $user->id) }}">Visualizar</a>
              
                <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                <hr>
            </li>
        @endforeach
    </ul>
@endsection
