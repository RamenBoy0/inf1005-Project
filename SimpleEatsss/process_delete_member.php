
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
                $email = $_SESSION["email"];
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
                    
//                    stmt = $conn->prepare("DELETE FROM world_of_food_recipes WHERE id=?");
//                    $stmt -> bind_param("i", $recipe_id);
//                    $stmt-> execute();
                    
//                    mysqli_query($conn,"DELETE FROM world_of_food_recipes WHERE id='" . $recipe_id . "'");
                      $stmt = $conn->prepare("DELETE FROM world_of_food_members WHERE email=?");
                      $stmt->bind_param("s", $email);
                      $stmt->execute();
                      
                    $message = "Record Deleted Successfully";
                        
                        echo "<br><br><br>";
                        echo "<h1>" . $message . "</h1>";

                        echo "<a href='logout.php' class = 'btn btn-success'>End Account</a>";
                        
                     

                }
                ?>
                <?php

                session_start();

                session_destroy();

                header("location:login.php");
                ?>
            <br><br>
            </section>
        </main>
        <?php
        include "footer.php";
        ?>
    </body>
</html>

