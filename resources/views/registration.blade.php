@extends('layouts.app')

@section("title")Форма регистрации@endsection

@section("content")
<form action="" method="POST">
@csrf
<h1>Регистрация</h1>
<div id="email">
        <label for="email">Email</label>
        <input type="text" id="email">
    </div>

    <div id="login">
        <label for="login">Логин</label>
        <input type="text" id="login">
    </div>
    
    <div id="password">
        <label for="password">Пароль</label>
        <input type="password" id="password">
    </div>

    <div id="check_password">
        <label for="check_password">Проверка пароля</label>
        <input type="password" id="check_password">
    </div>

    <div id="button">
        <button type="submit">Зарегистрироваться</button>
    </div>


</form>

@endsection