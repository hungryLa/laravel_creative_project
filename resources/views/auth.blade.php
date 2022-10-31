@extends('layouts.app')

@section("title")Форма авторизации@endsection

@section('content')
<form action="" method="POST">
@csrf
<h1>Авторизация</h1>
    <div id="login">
        <label for="login">Логин</label>
        <input type="text" id="login">
    </div>
    
    <div id="password">
        <label for="password">Пароль</label>
        <input type="password" id="password">
    </div>

    <div id="button">
        <button type="submit">Войти</button>
        <a href="{{route('registration')}}">Зарегистрироваться</a>
    </div>


</form>

@endsection
