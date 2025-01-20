<?php
// add category code goes here
require_once 'Category.php';
// create category object
$categoryObj = new Category();

// check if form is submitted
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $categoryObj->addCategory($name);
    // redirect to index page
    header('Location: index.php');  
}