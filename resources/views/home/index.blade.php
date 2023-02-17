@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Somente usuários logado podem ter acesso a este conteúdo.</p>
        @endauth

        @guest
        <h1>Home</h1>
        <p class="lead">Faça Login para ter acesso ao nosso sistema</p>
        @endguest
    </div>
@endsection