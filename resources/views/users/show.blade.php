@extends('layouts.app')
@section('title', 'ComandaOn - Usuario')

@section('content')
    <h3> Usuário: {{ $user->name }}</h3>
    <ul>
        <li>
            {{ $user->user }}
        </li>
        <li>
            {{ $user->occupation }}
        </li>
    </ul>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
        @method('delete')
        @csrf
        <button>Apagar</button>
    </form>
    
@endsection
