<?php
// Require task file
require_once "Task.php";

// Check if the request method is POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $taskId = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $categoryId = $_POST['category_id'];

    // Validate required fields
    if(empty($taskId) || empty($title)){
        die("Task ID and Title are required.");
    }

    // Initialize task object
    $taskObj = new Task();

    // Update the task in the database
    $result = $taskObj->updateTask($taskId, $title, $description, $categoryId);

    // Redirect to the index page
    if($result){
        header("Location: index.php?message=Task updated successfully");
    }else{
        header("Location: index.php?error=Failed to update task");
    }
    exit;
}else{
    header("Location: index.php");
    exit;
}

