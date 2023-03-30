<?php
session_start();
$fname = $_SESSION["name"];
$email = $_SESSION["email"];

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a href="index.php" class="logo"><i class="fas fa-utensils"></i>Simply Eats</a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li><a class="active" href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="view_all_recipes.php">Recipes</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="rating.php">Rating</a></li>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <li><a href="add_recipe.php">Add Recipe</a></li>
         <?php endif; ?>
         <?php if ($_SESSION["logged_in"] == true): ?>
        <li><a href="view_my_recipe.php">My Recipe</a></li>
         <?php endif; ?>
        
    </ul>

    <div class="navbar-icons">
        <?php if ($_SESSION["logged_in"] == true): ?>
        <?php
        $errorMsg = $success = "";

        // Create database connection.
        $config = parse_ini_file('../../private/db-config.ini');
        $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
        // Check connection
        if ($conn->connect_error) {
            $errorMsg = "Connection failed: " . $conn->connect_error;
            $success = false;
        } 
        else 
        {
            // Retrieve user photo from the database
            if ($_SESSION["logged_in"]) {
              $sql = "SELECT upload FROM world_of_food_members WHERE email = '$email'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $photo = $row["upload"];        
                $fileName = basename($_FILES["upload1"]["name"]);
                $imageSource = 'images/' . (($fileName == "") ? $photo : $fileName);
              }
            }
        }
        ?>
        
        <img src='<?php echo $imageSource; ?>' alt="User Photo" style="height:40px;width:40px;border-radius: 50%;">  
        <a href="profile.php"><?php echo strstr($email, '@', true); ?></a>   
        <?php endif; ?>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="search.php" class="fas fa-search" aria-hidden = "true" tabindex="-1"></a>
        <?php endif; ?>
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href="favourites.php" class="fas fa-heart" aria-hidden = "true" tabindex="-1"></a>
         <?php endif; ?>
        
        <?php if (!isset($_SESSION["logged_in"])): ?>
        <a href="register.php" class="fa fa-registered" aria-hidden = "true" tabindex="-1"></a>
        
       
        <a href="login.php" class="far fa-id-card"></a>
        <?php endif; ?> 
        
        <?php if ($_SESSION["logged_in"] == true): ?>
        <a href = "logout.php" class="fas fa-sign-out-alt" aria-label="Logout"></a>
        <?php endif; ?> 
    </div>

    </div>
    
</nav>