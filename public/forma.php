<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>The Forma</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
</head>
<body>
<div class="test_bl">
	<form action="/comments" method="POST">
		<p>Name</p><br />
		<input type="text" name="name"><br /><br />
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<input type="submit" name="submit" value="add"><br />
	</form>
</div>				
</body>
</html>