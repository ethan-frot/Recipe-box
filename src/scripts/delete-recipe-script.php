<?php
$id = $_GET['id'];

// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");

// Prepare request
$request = $connectDataBase->prepare("DELETE FROM recipes.recipes WHERE id = :id");
// Bind params
$request->bindParam(':id', $id);
// Execute request
$request->execute();

header("Location: ../recipes.php");