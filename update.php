<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "producten.php";
    $product = new product($_POST["naam"], $_POST["beschrijving"], $_POST["prijs"], $_POST["aantal"]);
    $product->update($_GET["id"]);
}
else{
    require_once "producten.php";
    $product = new product(NULL, NULL, NULL, NULL);
    $products = $product->show($_GET["id"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form action="update.php?id=<?=$_GET["id"]?>" method="post">
        <input type="text" name="naam" value="<?=$products["Naam"]?>">
        <textarea name="beschrijving"><?=$products["Beschrijving"]?></textarea>
        <input type="number" name="prijs" value="<?=$products["Prijs"]?>" step="0.01">
        <input type="number" name="aantal" value="<?=$products["Aantal"]?>">
        <input type="submit" value="Update">
    </form>
</body>
</html>