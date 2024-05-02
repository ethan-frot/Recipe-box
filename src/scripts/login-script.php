<?php
$username = $_POST['username'];

// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");
// Prepare request
$request = $connectDataBase->prepare("SELECT * FROM recipes.users WHERE username = :username");
// Bind params
$request->bindParam(':username', $username);
// Execute request
$request->execute();
// Fetch data from the result
$result = $request->fetch(PDO::FETCH_ASSOC);

if ($result) {
    session_start();

    $_SESSION['id'] = $result['id'];
    $_SESSION['username'] = $result['username'];

    header("Location: ../recipes.php");
} else {
    header("Location: ../login.php?error=Erreur lors de la connexion");
}

