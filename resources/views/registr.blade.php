<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/mystyle.css') }}">

</head>
<body>
<div class="header">
    <h1>Форма регистрации</h1>
</div>


<div class="form_reg">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form name="reg_form" id="reg_form" action="{{ route('regist') }}" method="post">

        <fieldset class="form-group">
            <label for="Email">Email*</label>
            <input type="email" class="form-control" id="Email" name="regemail" value= "{{ old('regemail') }}" placeholder="Email">
        </fieldset>

        <fieldset class="form-group">
            <label for="Mobil">Mobil*</label>
            <input type="text" class="form-control" id="Mobil" name="regphone" value= "{{ old('regphone') }}" placeholder="Mobil">
        </fieldset>


        <fieldset class="form-group">
            <label for="Login">Логин*</label>
            <input type="text" class="form-control" id="Login" name="regname" value= "{{ old('regname') }}" placeholder="Login">
        </fieldset>
        <fieldset class="form-group">
            <label for="Password1">Пароль</label>
            <input type="password" class="form-control" id="Password1" name="pwd1"
                   placeholder="Пароль">

        </fieldset>
        <fieldset class="form-group">
            <input type="password" class="form-control" id="Password2" name="pwd2"
                   placeholder="Подтвердите пароль">
            <small class="text-muted">Повторите ввод пароля</small>
        </fieldset>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
        <!--
        <button type="button" class="btn btn-warning" id="Index">Нет не хочу</button>
        -->
        {{ csrf_field()}}
    </form>
</div>
<p></p>
<p></p>
<p></p>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>
