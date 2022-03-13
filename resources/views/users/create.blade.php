@extends('layouts.app')
@section('title', 'Novo Usuário')
@section('content')
<h3>Novo Usuário</h3>
@include('components.validate-forms')
<form action="{{route('users.store')}}" method="post">
    @include('users.partials.form')
</form>
    
@endsection