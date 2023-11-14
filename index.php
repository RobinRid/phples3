<?php
//start the session
session_start();
//check if the user is logged in
if(!isset($_SESSION["email"])){
    //redirect to login.php
    header("Location: login.php");
}

require_once "producten.php";
$product = new product(NULL, NULL, NULL, NULL);
$products = $product->read();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "style.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
    <div class="button">
    <button><a href="product.php">+</a></button>
    <button><a href="logout.php">Logout</a></button>
    </div>
    <div id="main">
    <?php
    //get all the products from the database
    foreach($products as $product){
        echo "<div class='product'>";
        echo "<a href='Show.php?id=" . $product["Id"] . "'>";
        echo "<h1>" . $product["Naam"] . "</h1>";
        echo "<p>" . $product["Beschrijving"] . "</p>";
        echo "<p>" . $product["Prijs"] . "</p>";
        echo "<p>" . $product["Aantal"] . "</p>";
        echo "</a>";
        echo "</div>";
    }
    ?>
    </div>
</body>
</html>