<?php
session_start();

$recipe_name = $_POST['recipe_name'];
$recipe_ingredients = $_POST['recipe_ingredients'];
$recipe_steps = $_POST['recipe_steps'];
$recipe_img = $_POST['recipe_img'];

// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");
// Prepare request
$request = $connectDataBase->prepare("INSERT INTO recipes.recipes (name, ingredients, steps, user_id, image_src) VALUES (:name, :ingredients, :steps, :user_id, :image_src)");
// Bind params
$request->bindParam(':name', $recipe_name);
$request->bindParam(':ingredients', $recipe_ingredients);
$request->bindParam(':steps', $recipe_steps);
$request->bindParam(':image_src', $recipe_img);
$request->bindParam(':user_id', $_SESSION['id']);

// Execute request
$request->execute();

header("Location: ../recipes.php");