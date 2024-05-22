<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
}
?>

<?php require_once 'parts/header.php'; ?>

<div class="container">
  <h1>Nouvelle recette</h1>

  <form action="scripts/create-recipe-script.php" method="POST">
    <div class="container">
      <input required class="input-text" type="text" placeholder="Nom de la recette" name="recipe_name">
      <input required class="input-text" type="text" placeholder="Lien de l'image" name="recipe_img">
      <textarea required class="input-text" placeholder="liste d'ingrédients (séparez avec un ; )" name="recipe_ingredients"></textarea>
      <textarea required class="input-text" placeholder="étapes (séparez avec un ; )" name="recipe_steps"></textarea>
      <input class="input-submit" type="submit" value="Envoyer">
    </div>
  </form>
</div>

<?php require_once 'parts/footer.php'; ?>