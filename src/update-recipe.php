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
  <h1 class="form-title">Update recipe</h1>

  <form action="scripts/update-recipe-script.php" method="POST">
      <div class="container">
      <input type="number" name="id" id="id" style="display: none;" value="<?= $_GET['id']; ?>">
      <input required class="form-input" type="text" placeholder="Name" name="recipe_name" value="<?= $recipes['name']; ?>">
      <input required class="form-input" type="text" placeholder="Link image (https://)" name="recipe_img" value="<?= $recipes['image_src']; ?>">
      <textarea required rows="4" class="form-input" placeholder="Ingredients (Separate with semi-colon)" name="recipe_ingredients"><?= $recipes['ingredients']; ?></textarea>
      <textarea required rows="4" class="form-input" placeholder="Steps (Separate with semi-colon)" name="recipe_steps"><?= $recipes['steps']; ?></textarea>
      <input class="form-button" type="submit" value="Send">
    </div>
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>