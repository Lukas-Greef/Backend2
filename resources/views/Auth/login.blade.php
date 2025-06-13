<!DOCTYPE html>
<html>
<head><title>Login</title></head>
<body>
<h2>Login</h2>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="email" name="email" placeholder="E-mail" required><br>
    <input type="password" name="password" placeholder="Wachtwoord" required><br>
    <button type="submit">Inloggen</button>
</form>
<p>Nog geen account? <a href="{{ route('register') }}">Registreer</a></p>
</body>
</html>
