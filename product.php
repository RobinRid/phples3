<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "producten.php";
    $product = new product($_POST["naam"], $_POST["beschrijving"], $_POST["prijs"], $_POST["aantal"]);
    $product->create();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <form action="product.php" method="post">
        <input type="text" name="naam" placeholder="Naam">
        <textarea name="beschrijving" placeholder="Beschrijving"></textarea>
        <input type="number" name="prijs" placeholder="Prijs" step="0.01">
        <input type="number" name="aantal" placeholder="Aantal">
        <input type="submit" value="Toevoegen">
</body>
</html>