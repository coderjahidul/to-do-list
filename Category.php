<?php
require_once 'db.php';

class Category {
    private $db;

    public function __construct(){
        $this->db = (new Database())->getConnection();
    }

    public function getAllCategories(){
        $query = "SELECT * FROM categories";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCategory($name){
        $query = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        return $stmt->execute();
    }
}