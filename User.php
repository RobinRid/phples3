<?php
require_once "Database.php";
class User extends Database {
    private $naam;
    private $email;
    private $wachtwoord;
    protected $conn;

    public function __construct($naam, $email, $wachtwoord){
        parent::__construct();
        $this->naam = $naam;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }


    public function create(){
        $this->wachtwoord = password_hash($this->wachtwoord, PASSWORD_BCRYPT, ['cost' => 12]);
        echo $this->wachtwoord;
        echo $this->email;
        echo $this->naam;
        $sql = "INSERT INTO gebruiker (id, naam, email, wachtwoord) VALUES (:id, :naam, :email, :wachtwoord)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id", null, PDO::PARAM_STR);
        $stmt->bindParam(":naam", $this->naam);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":wachtwoord", $this->wachtwoord);
        $stmt->execute();
        header("Location: login.php");
    }
    public function login(){
        $sql = "SELECT * FROM gebruiker WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        $user = $stmt->fetch();
        if($user){
            if(password_verify($this->wachtwoord, $user["wachtwoord"])){
                session_start();
                $_SESSION["email"] = $this->email;
                header("Location: index.php");
            }else{
                echo "gegevens incorrect";
            }
        }else{
            echo "gegevens incorrect";
        }
    }
}