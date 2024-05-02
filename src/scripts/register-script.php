<?php
$username = $_POST['username'];

// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");

// Fetch all data
$fetch = $connectDataBase->prepare("SELECT * FROM recipes.users WHERE username = :username");
// Bind params
$fetch->bindParam(':username', $username);
// Execute request
$fetch->execute();
// Fetch data from the result
$result = $fetch->fetchAll(PDO::FETCH_ASSOC);

if (!$result) {
    // Prepare request
    $request = $connectDataBase->prepare("INSERT INTO recipes.users (username) VALUES (:username)");
    // Bind params
    $request->bindParam(':username', $username);
    // Execute request
    $request->execute();

    header("Location: ../login.php?success=Utilisateur crée avec succès !");
} else {
    header("Location: ../login.php?error=Utilisateur déjà crée");
}


