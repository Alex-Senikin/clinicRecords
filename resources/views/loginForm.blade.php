@extends('layout')

@section('login_active') active @endsection

@section('main_content')
<form action="{{ route('loginCheck') }}" method="POST">
    <label>Логин:</label><br>
    <input type="text"><br>
    <label>Пароль:</label><br>
    <input type="password"><br>
    <input type="submit">
</form>
@endsection
