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
// Determine the current order direction
$order = isset($_GET['order']) && $_GET['order'] === 'asc' ? 'asc' : 'desc';
// Determine the opposite order
$toggleOrder = $order === 'asc' ? 'desc' : 'asc';
// Prepare request 
$request = $connectDataBase->prepare("SELECT * FROM recipes WHERE user_id = :user_id ORDER BY `id` $order");
// Bind params
$request->bindParam(':user_id', $_SESSION['id']);
// Execute request
$request->execute();
// Fetch all data from table posts
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);
?>
    <!-- Show data in HTML  -->

    <section id="post-list" class="container">
        <div class="recipe-header-container">
            <h1 class="recipe-header-title">Welcome <span class="title"><?php echo $_SESSION['username'] ?></span>, <br>you
                can see your recipes here</h1>
                <div class="recipe-header-button-container">
                    <a href="?order=<?php echo $toggleOrder; ?>" class="recipe-header-button">
                        <?php echo $order === 'asc' ? '<i class="fa-solid fa-arrow-up-wide-short"></i>' : '<i class="fa-solid fa-arrow-down-short-wide"></i>'; ?>
                    </a>  
                    <a class="recipe-header-button" href="./new-recipe.php"><i class="fa-regular fa-square-plus"></i></a> 
                </div>
        </div>
        <div class="recipes-container">
            <?php if (!$recipes) : ?>
                <a href="./new-recipe.php" class="no-recipes"> There is no recipe, add one to see your recipes</a>
            <?php else : ?>
            <?php foreach ($recipes as $recipe) : ?>
                <div class="recipe-img" style="background-image: url('<?= $recipe['image_src'] ?>')">
                    <h1 class="recipe-img-title">
                        <?php echo $recipe['name']; ?>
                    </h1>
                    <div class="interactive-buttons">
                        <a class="interactive-button" href="./update-recipe.php?id=<?= $recipe['id'] ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <a class="interactive-button" href="./duplicate-recipe.php?id=<?= $recipe['id'] ?>">
                            <i class="fa-solid fa-clone"></i>
                        </a>
                        <a class="interactive-button"
                           href="./scripts/delete-recipe-script.php?id=<?= $recipe['id'] ?>">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </div>

                <div class="recipe-component">
                    <div class="recipe-step-container">
                        <h1 class="recipe-title">Steps</h1>
                        <ol class="styled-list">
                            <?php $steps = preg_split('/;\s*/', $recipe['steps']); ?>
                            <?php foreach ($steps as $index => $step) : ?>
                                <li class="order-items">
                                    <span class="order-number"><?php echo $index + 1; ?></span>
                                    <?php echo $step; ?>
                                </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>

                    <div class="recipe-ingredient-container">
                        <h1 class="recipe-title ingredient-title">Ingredients</h1>
                        <hr>
                        <div class="ingredients-container">
                            <?php $ingredients = preg_split('/;\s*/', $recipe['ingredients']); ?>
                            <?php foreach ($ingredients as $ingredient) : ?>
                                <p class="ingredient"><?php echo $ingredient; ?></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <hr>
            <?php endforeach; ?>
        </div>
        <?php endif ?>
        </div>
    </section>

<?php require_once 'parts/footer.php'; ?>