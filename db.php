<?php
class Database {
    private $host = 'localhost';
    private $bdname = 'todolist';
    private $user = 'root';
    private $pass = '';
    public $conn;

    public function __construct(){
        try{
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->bdname", $this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection(){
        return $this->conn;
    }
}