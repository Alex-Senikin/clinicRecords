@extends('layout')

@section('login_active') active @endsection

@section('main_content')
<form action="{{ route('loginCheck') }}" method="POST">
    @csrf
    <label>Логин:</label><br>
    <input type="text" name="login"><br>
    <label>Пароль:</label><br>
    <input type="password" name="password"><br>
    <input type="submit">
</form>
@endsection
