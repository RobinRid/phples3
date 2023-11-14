<?php

require_once "Database.php";

class Comment extends Database {
    private $Id;
    private $naam;
    private $content;
    private $product_id;

    public function __construct($naam, $content, $product_id){
        parent::__construct();
        $this->naam = $naam;
        $this->content = $content;
        $this->product_id = $product_id;
    }
    public static function create(){
        $sql = "INSERT INTO Comment (naam, content, product_id) VALUES (:naam, :content, :product_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":naam", $this->naam);
        $stmt->bindParam(":content", $this->content);
        $stmt->bindParam(":product_id", $this->product_id);
        $stmt->execute();
        header("Location: show.php?id=" . $this->product_id);
    }
    public function read(){
        $sql = "SELECT * FROM comment";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

}