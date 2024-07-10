@extends('layouts.template')


@section('content')
    <form action="{{route('user.update', ['id' => $user->id])}}" method="POST">
        @csrf
        <label for="name">Name : <input type="text" name="name" value="{{$user->name}}"></label><br><br>
        <label for="email">Email : <input type="email" name="email" value="{{$user->email}}"></label><br><br>
        <label for="password">Mot de passe : <input type="password" name="password" value="{{$user->password}}"></label><br><br>
        <input type="submit" name="submit">
    </form>
    
@endsection