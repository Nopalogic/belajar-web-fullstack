<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Form</title>
</head>
<body>
  <h1>Login Form</h1>
  <form action="{{ route('register_view') }}" method="get">
    @csrf
    <input type="text" placeholder="Username" id="username" name="username">
    <input type="text" placeholder="Password" id="password" name="password">
    <button type="submit">Register</button>
  </form>
</body>
</html>