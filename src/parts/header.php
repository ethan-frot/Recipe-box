<?php
if (!isset($_SESSION['id'])) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe box</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
          integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link href="../styles/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <nav class="navbar">

        <div class="nav-container">
            <h3 class="nav-title">Recipe box</h3>
            <div class="nav-items">
                <a href="../recipes.php">Recettes</a>
                <a href="../login.php">Login</a>
                <a href="../register.php">Register</a>
                <a href="../scripts/disconnect-script.php">Disconnect</a>
            </div>
        </div>
        <?php if (isset($_GET['error'])) : ?>
            <div class="nav-message">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success'])) : ?>
            <div class="nav-message">
                <?php echo $_GET['success']; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['id'])) : ?>
            <div class="nav-connected"><p> User connected </p></div>
        <?php else : ?>
            <div class="nav-connected"><p> User disconnected </p></div>
        <?php endif ?>
    </nav>
</div>

<hr>