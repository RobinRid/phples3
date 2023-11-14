<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "User.php";
    $user = new User(NULL, $_POST["email"], $_POST["wachtwoord"]);
    $user->login();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div class="login">
    <form action="login.php" method="post">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="wachtwoord" placeholder="Wachtwoord">
        <input type="submit" value="Login">
    </form>
    </div>
    <div class="register">
    <button><a href="register.php">Register</a></button>
    </div>
</body>
</html>