<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <h1>Selamat Datang {{ session('user')->username }}</h1><br>
    <button><a href="{{ route('login.logout') }}">Logout</a></button>
</body>

</html>
