<!doctype html>
<html lang="en">
    <head>
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
            $email_query = "SELECT * FROM world_of_food_recipes WHERE email = '" . $email . "'";
            $result_email = mysqli_query($conn, $email_query);
                
            }
        ?>
        
<main class="cuisine-container">
    <h3>My Recipes</h3>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($result_email)) {
        ?>
        <article class="col-sm">
            <a href="#" class="fas fa-heart"></a>
            <h5><?php echo $row['recipe_name']; ?></h5>
            <figure>
                <img src='images/<?php echo $row["photo"]; ?>' />
            </figure>
            <div class="button">
                <a href= >View Recipe</a>
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

        
        

