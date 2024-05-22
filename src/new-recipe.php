<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<?php require_once 'parts/header.php'; ?>

<div class="container">
  <h1 class="form-title">New recipe</h1>

  <form action="scripts/create-recipe-script.php" method="POST">
    <div class="container">
      <input required class="form-input" type="text" placeholder="Name" name="recipe_name">
      <input required class="form-input" type="text" placeholder="Link image (https://)" name="recipe_img">
      <textarea required rows="4" class="form-input" placeholder="Ingredients (Separate with semi-colon)" name="recipe_ingredients"></textarea>
      <textarea required rows="4" class="form-input" placeholder="Steps (Separate with semi-colon)" name="recipe_steps"></textarea>
      <input class="form-button" type="submit" value="Send">
    </div>
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>