<html lang="en">
    <head>
    <script defer src="js/favourite_delete_recipe.js"></script>
   <link rel="stylesheet" href="css/cuisines.css">
        <?php
            include "header_nav_footer.php";
            
        ?>
    </head>
    
    <body>
        <header>
        <?php
            include "navbar.php";
        ?>  
        </header>
        
        <?php
            $member_id =  $_SESSION["id"];
            $recipe_id = $_GET["recipe_id"];
            $errorMsg = $success = "";
            // Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
            // Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
    } else {
            $stmt = $conn->prepare("INSERT INTO world_of_food_favourites(user_id, recipe_id) VALUES (?, ?)");
            $stmt->bind_param("ii", $member_id, $recipe_id);
                
            }
           if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
    
    $stmt= $conn->prepare("SELECT s.recipe_name, s.email, s.photo, f.recipe_id FROM world_of_food_recipes as s LEFT JOIN world_of_food_favourites as f ON f.recipe_id = s.id WHERE f.user_id =?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $favourite = $stmt->get_result();
//    $favourite_query = "SELECT s.recipe_name, s.email, s.photo, f.recipe_id FROM world_of_food_recipes as s LEFT JOIN world_of_food_favourites as f ON f.recipe_id = s.id WHERE f.user_id = ".$member_id."";
//    $favourite = mysqli_query($conn, $favourite_query);
   
    $conn->close();

        ?>
        
<main class="cuisine-container">
    <h3>Favorite Recipes</h3>
    <br>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($favourite)) {
        ?>
        
        <article class="col-sm">
            <strong><h4><?php echo $row['recipe_name']; ?></h4></strong>
            <i><h5><?php echo "Recipe by:", strstr($row['email'], '@', true); ?></h5></i>
            <figure>
                <a href="#" onclick="deleteFromFavorites(<?php echo $row['recipe_id']; ?>)" class="heart-icon fas fa-heart fa-3x"></a>
                <img src='images/<?php echo $row["photo"]; ?>' />
            </figure>
 
            <div class="button">
                <a href="<?php if ($_SESSION["logged_in"] == true): ?>view_all_recipe_details.php?id=<?php echo $row['recipe_name'];?>
                   <?php elseif($_SESSION["logged_in"] == false):?>login.php <?php endif; ?>">View Recipe</a>
            </div>
        </article>
        
        <?php
        }
        if (mysqli_num_rows($result_email) == 0) {
        }
        ?>
        </div>
</main>
    </body>
    <footer>
    <?php
        include "footer.php";
    ?>
    </footer>
</html>

        
        

