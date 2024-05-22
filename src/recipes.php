<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<?php require_once 'parts/header.php'; ?>

<?php
// Connect to db
$connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");
// Prepare request
$request = $connectDataBase->prepare("SELECT * FROM recipes WHERE user_id = :user_id ORDER BY `id` DESC");
// Bind params
$request->bindParam(':user_id', $_SESSION['id']);
// Execute request
$request->execute();
// Fetch all data from table posts
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Show data in HTML  -->

    <section id="post-list" class="container">
        <h1>Welcome <span class="title"><?php echo $_SESSION['username'] ?></span>, you can see your recipes here</h1>
        <br>
        <ul>
            <?php if (!$recipes) : ?>
                <span class="no-recipes"> Il n'y a aucune recette </span>
            <?php else : ?>
                <?php foreach ($recipes as $recipe) : ?>
                    <div>
                    <img class="login-img" src="<?= $recipe['image_src'] ?>"/>
                    <div>
                        <?php echo $recipe['name']; ?>
                        <div>
                            <?php $ingredients = preg_split('/;\s*/', $recipe['ingredients']); ?>
                            <?php foreach ($ingredients as $ingredient) : ?>
                                <li><?php echo $ingredient; ?></li>
                            <?php endforeach; ?>
                        </div>
                        <ul>
                            <?php $steps = preg_split('/;\s*/', $recipe['steps']); ?>
                            <?php foreach ($steps as $step) : ?>
                                <li><?php echo $step; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <a href="./scripts/remove-recipe-script.php?id=<?= $recipe['id'] ?>">
                        <i class="fa-solid fa-trash" style="color: black;"></i>
                    </a>
                    <a href="./modify-recipe.php?id=<?= $recipe['id'] ?>">
                        <i class="fa-solid fa-pen-to-square" style="color: black;"></i>
                    </a>
                    <a href="./duplicate-recipe.php?id=<?= $recipe['id'] ?>">
                        <i class="fa-solid fa-clone" style="color: black;"></i>
                    </a>
                <?php endforeach; ?>
                    </div>
            <?php endif ?>
        </ul>
    </section>
    <a href="./new-recipe.php">Add new recipe</a>

<?php require_once 'parts/footer.php'; ?>