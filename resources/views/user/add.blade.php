@extends('layouts/template')

@section('content')
    <form action="{{route('user.check')}}" method="POST">
        @csrf
        <label for="name">Name : <input type="text" name="name" placeholder="Votre nom"></label><br><br>
        <label for="email">Email : <input type="email" name="email" placeholder="Votre mail"></label><br><br>
        <label for="password">Mot de passe : <input type="password" name="password" placeholder="mot de passe"></label><br><br>
        <input type="submit" name="submit">
    </form>

@endsection