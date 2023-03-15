<!doctype html>
<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
            
        ?>
       
        <link rel="stylesheet" href="css/cuisines.css">
    </head>
    
    <body>
        <header>
        <?php
            include "navbar.php";
        ?>  
        </header>
        
                <!-- Create the modal -->
        <div class="modal fade" id="favorite-recipe-modal" tabindex="-1" role="dialog" aria-labelledby="favorite-recipe-modal-label" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="favorite-recipe-modal-label">Favorite Recipe</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Do you want to favorite this recipe?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary">Yes</button>
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              </div>
            </div>
          </div>
        </div>
        
       
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
            <h5><?php echo $row['recipe_name']; ?></h5>
            <figure>
                <img src='images/<?php echo $row["photo"]; ?>' />
            </figure>
            <div class="button-group">
                <a href="#" data-toggle="modal" data-target=
                   "#favorite-recipe-modal" class="heart-icon fas fa-heart fa-3x"></a>
            <div class="button">
                <a href= >View Recipe</a>
            </div>
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

        
        

