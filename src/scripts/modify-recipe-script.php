<?php
$recipe_name = $_POST['recipe_name'];
$recipe_ingredients = $_POST['recipe_ingredients'];
$recipe_steps = $_POST['recipe_steps'];
$recipe_img = $_POST['recipe_img'];
$recipe_id = $_POST['id'];

// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");
// Prepare request
$request = $connectDataBase->prepare("UPDATE recipes.recipes SET name = :name, ingredients = :ingredients, steps = :steps, image_src = :image_src WHERE id = :id");
// Bind params
$request->bindParam(':name', $recipe_name);
$request->bindParam(':ingredients', $recipe_ingredients);
$request->bindParam(':steps', $recipe_steps);
$request->bindParam(':image_src', $recipe_img);
$request->bindParam(':id', $recipe_id);

// Execute request
$request->execute();

header("Location: ../recipes.php");