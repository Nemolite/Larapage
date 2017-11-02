<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin.css') }}">

</head>
<body>

<nav class="navbar navbar-dark navbar-fixed-top bg-inverse">
    <button type="button" class="navbar-toggler hidden-sm-up" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Test</a>
    <div id="navbar">
        <nav class="nav navbar-nav pull-xs-left">
            <a class="nav-item nav-link" href="/admin">Панель управления</a>
            <a class="nav-item nav-link" href="/">Выход</a>
        </nav>
        <form class="col-lg-3" action="{{ route('search') }}" method="post">
            {{ csrf_field()}}
            <div class="input-group">
                <input type="text" class="form-control" id="search" name="search" placeholder="Поиск...">
                <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li class="active"><a href="{{ route('admin') }}">Users<span class="sr-only">(current)</span></a></li>
            </ul>

        </div>


        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Результаты поиска</h1>

            <h2>Users</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>

                    <tr>
                        <th>ID</th>
                        <th>Login</th>
                        <th>Mobil</th>
                        <th>Email</th>

                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($result as $res)
                        <tbody>

                        <th>{{ $res["id"] }}</th>
                        <th>{{ $res["login"] }}</th>
                        <th>{{ $res["phone"] }}</th>
                        <th>{{ $res["email"] }}</th>

                        </tbody>

                    </tbody>
                    @endforeach
                </table>
                <p>{{ $result->render() }}</p>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
</body>
</html>
