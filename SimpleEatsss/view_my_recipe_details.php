<?php
session_start();
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>
    <head>
    <?php
    include "header_nav_footer.php";
    ?>

    <!-- Custom JS -->
     <script defer src="js/delete_recipe.js"></script>
        <link rel="stylesheet" href="css/cuisines.css">

  
    </head>
 
    <body>
        <header>
             <?php
            include "navbar.php";
            ?>
        </header>
        
                        <!-- Create the modal -->
    <div class="modal fade" id="delete-recipe-modal" tabindex="-1" role="dialog" aria-labelledby="favorite-recipe-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="favorite-recipe-modal-label">Delete Recipe</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you want to delete this recipe?</p>
                    <input type="hidden" id="recipe-id" name="recipe-id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delete-recipe-btn">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
        
        <div class="cuisine-container">
            <section>
                
                <h1><b>Recipe Details</b></h1>
                <br>
          
            <?php 
              
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } 
                else {
                    
                    // Retrieve all rows from the world_of_food_recipes table that match the email address
                    
                    $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes WHERE email =?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result_recipe = $stmt->get_result();

                    // Loop through the results and print them out
                    while ($row_recipe = mysqli_fetch_assoc($result_recipe)) {
                        
                    ?>
                        
                    <section class="recipe-info">
                        
                        <a id="<?php echo $row_recipe["id"]; ?>"></a>
                        <h3><?php echo $row_recipe["recipe_name"]; ?></h3>
                        <a href="update_recipe.php?id=<?php echo $row_recipe["id"]; ?>"><i style='font-size:24px' class='fas'>&#xf303;</i></a>
                        <a href="#" data-toggle="modal" data-target= "#delete-recipe-modal" onClick="setRecipeId(<?php echo $row_recipe["id"]; ?>)"><i class='fas fa-trash' style='font-size:24px;color: red'></i></a>
                        
                        
                        <p><?php echo $row_recipe["description"]; ?></p>
                        
                        <div class="recipe-img">
                            <img src='images/<?php echo $row_recipe["photo"]; ?>' />
                        </div>
                        
                        <div class="recipe-icons">
                        <div class="box">
                          <h5>prep time</h5>
                          <p><?php echo $row_recipe["prep_time"]; ?></p>
                        </div>
                        <div class="box">
                          <h5>cook time</h5>
                          <p><?php echo $row_recipe["cook_time"]; ?></p>
                        </div>
                        <div class="box">
                          <h5>serving</h5>
                          <p><?php echo $row_recipe["serving"]; ?></p>
                        </div>
                      </div>
                    </section>
                
                
                <section class="recipe-ingredient">
                    <h4>Ingredients</h4>
                    <p class="single-ingredient"><?php echo $row_recipe["ingredients"]; ?></p>
                </section>
                  
                <section class="recipe-guide">
                    <h4>Methods</h4>
                    <div class="steps">
                        
                      <p>
                        <?php echo $row_recipe["methods"]; ?>
                      </p>
                    </div>
                </section>
                
                <br><br>
            <?php      
                    }
            
                }
                
                
            ?>
          
              
            </section>
        </div>

        <footer>
        <?php
            include "footer.php";
        ?>
        </footer>
    </body>


</html>
