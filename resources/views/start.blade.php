<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/mystyle.css') }}">

</head>
<body>


<div class="container">

    <form class="form-signin" role="form" method="post" action="{{ url('/') }}" name="form_login">
        {{ csrf_field() }}
        <h3 class="form-signin-heading" style="text-align: center;">Добро пожаловать !</h3>
        <label for="inputLogin" class="sr-only">Login</label>
        <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Ваш логин" required autofocus>

        @if ($errors->has('login'))
            <span class="help-block">
                 <strong>{{ $errors->first('login') }}</strong>
            </span>
        @endif

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Пароль" required>

        @if ($errors->has('pass'))
            <span class="help-block">
                 <strong>{{ $errors->first('pass') }}</strong>
            </span>
        @endif


        <button class="btn btn-lg btn-primary btn-block" type="submit">Вход</button>
        <p></p>
        <p><a href="/regist">Зарегистрироваться</a></p>
        @include('social')
    </form>

</div> <!-- /container -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>

