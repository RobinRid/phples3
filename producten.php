<?php
require_once "Database.php";
class product extends Database{
    private $Id;
    private $Naam;
    private $Beschrijving;
    private $Prijs;
    private $Aantal;

    public function __construct($Naam, $Beschrijving, $Prijs, $Aantal){
        parent::__construct();
        $this->Naam = $Naam;
        $this->Beschrijving = $Beschrijving;
        $this->Prijs = $Prijs;
        $this->Aantal = $Aantal;
    }
    public function create(){
        $sql = "INSERT INTO product (Naam, Beschrijving, Prijs, Aantal) VALUES (:Naam, :Beschrijving, :Prijs, :Aantal)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":Naam", $this->Naam);
        $stmt->bindParam(":Beschrijving", $this->Beschrijving);
        $stmt->bindParam(":Prijs", $this->Prijs);
        $stmt->bindParam(":Aantal", $this->Aantal);
        $stmt->execute();
        header("Location: index.php");
    }
    public function read(){
        $sql = "SELECT * FROM product";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }
    public function show($id){
        $this->Id = $id;
        $sql = "SELECT * FROM product WHERE Id = :Id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":Id", $this->Id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function update($id){
        $this->Id = $id;
        $sql = "UPDATE product SET Naam = :Naam, Beschrijving = :Beschrijving, Prijs = :Prijs, Aantal = :Aantal WHERE Id = :Id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":Id", $this->Id);
        $stmt->bindParam(":Naam", $this->Naam);
        $stmt->bindParam(":Beschrijving", $this->Beschrijving);
        $stmt->bindParam(":Prijs", $this->Prijs);
        $stmt->bindParam(":Aantal", $this->Aantal);
        $stmt->execute();
        header("Location: index.php");
    }
    }