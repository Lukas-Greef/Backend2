<!DOCTYPE html>
<html>
<head><title>Registreren</title></head>
<body>
<h2>Registreren</h2>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="text" name="name" placeholder="Naam" required><br>
    <input type="email" name="email" placeholder="E-mail" required><br>
    <input type="password" name="password" placeholder="Wachtwoord" required><br>
    <input type="password" name="password_confirmation" placeholder="Herhaal wachtwoord" required><br>
    <button type="submit">Registreer</button>
</form>
<p>Al een account? <a href="{{ route('login') }}">Login</a></p>
</body>
</html>
