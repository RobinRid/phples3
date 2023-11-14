<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //check if the passwords are the same
    if($_POST["wachtwoord"] == $_POST["wachtwoord2"]){
        //require the User.php file
        require_once "User.php";
        //create a new user object
        $user = new User($_POST["naam"], $_POST["email"], $_POST["wachtwoord"]);
        //call the create method
        $user->create();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "style.css" rel="stylesheet">
    <title>Register</title>
</head>
<body>
    <div class="login">
    <form action="register.php" method="post">
        <input type="text" name="naam" placeholder="Naam">
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="wachtwoord" placeholder="Wachtwoord">
        <input type="password" name="wachtwoord2" placeholder="Confirm wachtwoord">
        <input type="submit" value="Register">
    </form>
    </div>
</body>
</html>