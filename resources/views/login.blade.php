@extends('layouts.layout')
@section('title')
    Регистрация
@endsection
@section('content')
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Авторизация</h1>
            </div>

            <div class="login-form">
                <div class="control-group">
                    <input type="email" class="login-field" value="" placeholder="Почта" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <div class="control-group">
                    <input type="password" class="login-field" value="" placeholder="Пароль" id="login-pass">
                    <label class="login-field-icon fui-lock" for="login-pass"></label>
                </div>

                <a class="btn btn-primary btn-large btn-block" href="#">Войти</a>
                <a class="login-link" href="#">Забыли пароль?</a>
                <a class="login-link" href="{{route('vk.auth')}}">Вход через ВК</a>
            </div>
        </div>
    </div>
@endsection

