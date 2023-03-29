@extends('layouts.layout')
@section('title')
    Регистрация
@endsection
@section('content')
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Добавление Email</h1>
            </div>

            <form method="post" action="{{route('social.add_email')}}" class="login-form">
                @csrf
                <div class="control-group">
                    <input type="email" class="login-field" name="add_email" value="" placeholder="Почта" id="login-name">
                    <label class="login-field-icon fui-user" for="login-name"></label>
                </div>

                <input type="submit" class="btn btn-primary btn-large btn-block" value="Добавить"></input>
            </form>
        </div>
    </div>
@endsection

