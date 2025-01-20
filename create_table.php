<?php 
// require db file
require_once 'db.php';

// call database connection
$db = (new Database())->getConnection();

// create database categories table
$query = "CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
$stmt = $db->prepare($query);

// execute query
if (!$stmt->execute()) {
    echo "Error creating table: " . $stmt->errorInfo()[2];
}
// create database tasks table
$query = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
)";
$stmt = $db->prepare($query);

// execute query
if (!$stmt->execute()) {
    echo "Error creating table: " . $stmt->errorInfo()[2];
}



?>