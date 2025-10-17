<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>
    <h2>Login</h2>

    {{-- Pesan error jika login gagal --}}
    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    {{-- Form login --}}
    <form action="{{ route('login.process') }}" method="POST">
        @csrf
        <label>Username:</label><br>
        <input type="text" name="username" value="{{ old('username') }}"><br>
        @error('username') <small style="color:red;">{{ $message }}</small><br> @enderror

        <label>Password:</label><br>
        <input type="password" name="password"><br>
        @error('password') <small style="color:red;">{{ $message }}</small><br> @enderror

        <button type="submit">Login</button>
    </form>
</body>
</html>
