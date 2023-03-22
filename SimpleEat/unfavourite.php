<!doctype html>
<html lang="en">
    <head>
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
       
        <main class="container" id="add_recipe">
            <section>

                
                
                
                <?php

                $errorMsg = $success = "";
                $recipe_id = $_GET["recipe_id"];
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

                    $stmt = $conn->prepare("DELETE FROM world_of_food_favourites WHERE recipe_id=?");
                    $stmt->bind_param("i", $recipe_id);
                    $stmt->execute();
//                  mysqli_query($conn,"DELETE FROM world_of_food_favourites WHERE recipe_id='" . $recipe_id . "'");
                    header("location:favourites.php");
                    
                   

                }
                ?>
            <br><br>
            </section>
        </main>
        <?php
        include "footer.php";
        ?>
    </body>
</html>