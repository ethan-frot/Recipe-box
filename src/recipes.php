<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<?php require_once 'parts/header.php'; ?>


    <section id="post-list" class="container">
        <h1 class="text-center">Welcome <?php echo $_SESSION['username'] ?>, u can see ur recipes here</h1>
        <br>
        <ul>
            <?php
            // Connect to db
            $connectDataBase = new PDO("mysql:host=db;dbname=recipes", "root", "admin");
            // Prepare request
            $request = $connectDataBase->prepare("SELECT * FROM recipes WHERE user_id = :user_id");
            // Bind params
            $request->bindParam(':user_id', $_SESSION['id']);
            // Execute request
            $request->execute();
            // Fetch all data from table posts
            $recipes = $request->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <!-- Show data in HTML  -->

            <?php if (!$recipes) : ?>
                <div class="text-center alert alert-danger">
                    Il n'y a aucune recette
                </div>

            <?php else : ?>
                <?php foreach ($recipes as $recipe) : ?>
                    <div>
                        <?php echo $recipe['name']; ?>
                        <div>
                            <?php $ingredients = json_decode($recipe['ingredients']); ?>
                            <?php foreach ($ingredients as $ingredient) : ?>
                                <li><?php echo $ingredient; ?></li>
                            <?php endforeach; ?>
                        </div>
                        <ul>
                            <?php $steps = json_decode($recipe['steps']); ?>
                            <?php foreach ($steps as $step) : ?>
                                <li><?php echo $step; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endforeach; ?>
            <?php endif ?>

        </ul>
    </section>

<?php require_once 'parts/footer.php'; ?>