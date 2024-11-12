<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>

<body>
    <form action="{{ route('login.reg') }}" method="post">
        @csrf
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="email" name="email" placeholder="Email" required><br><br>
        <select name="role" required>
            <option value="" disabled selected>-- Role --</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select><br><br>
        <button type="submit">Register</button>
        <button><a href="{{ route('login.index') }}">Login</a></button>
    </form>
</body>

</html>
