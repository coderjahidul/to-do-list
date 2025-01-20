<?php
// require db file
require_once 'db.php';

class Task {
    private $db;
    public function __construct(){
        $this->db = (new Database())->getConnection();
    }

    public function getAllTasks(){
        $query = "SELECT tasks.*, categories.name as category_name FROM tasks LEFT JOIN categories ON tasks.category_id = categories.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTask($title, $description, $category_id) {
        $query = "INSERT INTO tasks (title, description, category_id) VALUES (:title, :description, :category_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    public function updateTask($id, $title, $description, $category_id) {
        $query = "UPDATE tasks SET title = :title, description = :description, category_id = :category_id WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }

    public function deleteTask($id){
        $query = "DELETE FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function getTaskById($id){
        $query = "SELECT * FROM tasks WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}