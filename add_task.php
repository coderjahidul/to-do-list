<?php
// require Task file
require_once 'Task.php';

// create task object
$taskObj = new Task();

// check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    $taskObj->addTask($title, $description, $category_id);

    // redirect to index page
    header('Location: index.php');
}

