<?php
session_start();
$fname = $_SESSION["name"];
?>
    
<nav class="navbar navbar-expand-sm navbar-light bg-light">

    <a href="index.php" class="logo"><i class="fas fa-utensils"></i>Simple Eats</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <a class="active" href="index.php">Home</a>
        <a href="about.php">About</a>
        <a href="view_all_recipes.php">Recipes</a>
        <a href="faq.php">FAQ</a>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="add_recipe.php">Add Recipe</a>
         <?php endif; ?>
         <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="view_recipe.php">My Recipe</a>
         <?php endif; ?>
        
    </ul>
    
    <ul class="navbar-icons">
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="#"><?php echo $fname; ?></a>
        <?php endif; ?>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="search.php" class="fas fa-search" aria-hidden = "true"></a>
        <?php endif; ?>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="favourites.php" class="fas fa-heart" aria-hidden = "true"></a>
         <?php endif; ?>
        <a href="register.php" class="fa fa-registered" aria-hidden = "true"></a>
        <?php if (!isset($_SESSION["logged_in"])): ?>
        <a href="login.php" class="far fa-id-card"></a>
        <?php endif; ?> 
        <a href = "logout.php" class="fas fa-sign-out-alt"></a>
    </ul> 
        
    </div>
    
</nav>

