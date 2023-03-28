<!doctype html>
<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
            
        ?>
        <script defer src="js/favourite_recipe.js"></script>
                <link rel="stylesheet" href="css/recipes.css">
    </head>
    
    <body>
        <header>
        <?php
            include "navbar.php";
        ?>  
        </header>
       
        <?php
            $errorMsg = $success = "";
            $email = $_SESSION["email"];
            // Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
            // Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
    } else {
            
            $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes WHERE email =?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result_email = $stmt->get_result();
//            $result_email = mysqli_query($conn, $email_query);
                
            }
        ?>
        
<main class="cuisine-container">
    <div class ="header-section">
        <h1>My Recipes</h1>
    </div>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($result_email)) {
        ?>
        
        <article class="col-sm">
            <h5><?php echo $row['recipe_name']; ?></h5>
            <figure>
       <a href="#" onclick="addToFavorites(<?php echo $row['id']; ?>)" class="heart-icon fas fa-heart fa-3x"></a>
                <img src='images/<?php echo $row["photo"]; ?>' />
            </figure>
            <div class="button">
                <a href="view_my_recipe_details.php#<?php echo $row["id"]; ?>" >View Recipe</a>
            </div>
        </article>
        
        <?php
        }
        if (mysqli_num_rows($result_email) == 0) {
            echo "<h5>No recipes created yet.</h5>";
        }
        ?>
        </div>
    </div>
</main>
    </body>
    <footer>
    <?php
        include "footer.php";
    ?>
    </footer>
</html>

        
        

