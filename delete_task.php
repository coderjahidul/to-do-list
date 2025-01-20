<?php
// require task file
require_once 'Task.php';

// create task object
$taskObj = new Task();

// delete task
if($taskObj->deleteTask($_GET['id'])) {
    // redirect to index page
    header('Location: index.php');
}
