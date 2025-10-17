<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat Datang di Dashboard!</h2>
    <p>Halo, <b>{{ $username }}</b> 👋</p>

    <a href="{{ route('login') }}">Logout</a>
</body>
</html>
