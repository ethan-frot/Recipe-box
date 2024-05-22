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
$request = $connectDataBase->prepare("SELECT * FROM recipes WHERE id = :id");
// Bind params
$request->bindParam(':id', $_GET['id']);
// Execute request
$request->execute();
// Fetch all data from table posts
$recipes = $request->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
  <h1>Modifier la recette</h1>

  <form action="scripts/modify-recipe-script.php" method="POST">
    <div class="mb-3">
      <input type="number" name="id" id="id" style="display: none;" value="<?= $_GET['id']; ?>">
      <input required class="input-text" type="text" placeholder="Nom de la recette" name="recipe_name" value="<?= $recipes['name']; ?>">
      <input required class="input-text" type="text" placeholder="Lien de l'image" name="recipe_img" value="<?= $recipes['image_src']; ?>">
      <textarea required class="input-text" placeholder="liste d'ingrédients (séparez avec un ; )" name="recipe_ingredients"><?= $recipes['ingredients']; ?></textarea>
      <textarea required class="input-text" placeholder="étapes (séparez avec un ; )" name="recipe_steps"><?= $recipes['steps']; ?></textarea>
      <input class="input-submit" type="submit" value="Envoyer">
    </div>
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>