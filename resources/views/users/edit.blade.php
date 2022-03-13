@extends('layouts.app')
@section('title', 'Usuário - {{$user->name}}')
@section('content')
<h3>Usuario: {{$user->name}}</h3>

@include('components.validate-forms')

<form action="{{route('users.update', $user->id)}}" method="post">
    @method('PUT')
    @include('users.partials.form')
</form>
    
@endsection