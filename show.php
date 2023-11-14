<?php
require_once "producten.php";
$product = new product(NULL, NULL, NULL, NULL);
$products = $product->show($_GET["id"]);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    require_once "Comment.php";
    $comment = new Comment($_POST["naam"], $_POST["comment"], $_GET["id"]);
    $comment->create();
}
else{
    require_once "Comment.php";
    $comment = new Comment(NULL, NULL, NULL);
    $comments = $comment->read();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "style.css" rel="stylesheet">
    <title>Show</title>
</head>
<body>
    <div id="button">
    <button><a href="index.php">Home</a></button>
    <button><a href="update.php?id=<?=$_GET["id"]?>">Update</a></button>
    <button><a href="delete.php?id=<?=$_GET["id"]?>">Delete</a></button>
    </div>
    <div id="product">
    <?php
    echo "<h1>" . $products["Naam"] . "</h1>";
    echo "<p>" . $products["Beschrijving"] . "</p>";
    echo "<p>€" . $products["Prijs"] . "</p>";
    echo "<p>" . $products["Aantal"] . "</p>";
    ?>
    </div>
    <div id="comment">
        <form action="show.php?id=<?=$_GET["id"]?>" method="post">
            <input type="text" name="naam" placeholder="Naam">
            <textarea name="comment" placeholder="Comment"></textarea>
            <input type="submit" value="Comment">
        </form>
        <?php
        foreach($comments as $comment){
            echo "<div class='comment'>";
            echo "<h1>" . $comment["Naam"] . "</h1>";
            echo "<p>" . $comment["content"] . "</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>