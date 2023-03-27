<?php
include "header_nav_footer.php";
?>

        <!-- Custom JS -->
        <script defer src="js/add_recipe.js"></script>
        <link rel="stylesheet" href="css/cuisines.css">


  
    </head>
 
    <body>
        <header>
             <?php
            include "navbar.php";
            ?>
        </header>
        
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
                    
                    $email = "SimpleEats@hotmail.com";
                    // Retrieve all rows from the world_of_food_recipes table that match the email address
                    
                    $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes WHERE email =? ORDER BY id DESC");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result_recipe = $stmt->get_result();
        

                    // Loop through the results and print them out
                    while ($row_recipe = mysqli_fetch_assoc($result_recipe)) {
                        
                    ?>
                        
                    <section class="recipe-info">
                        
                        <a id="<?php echo $row_recipe["id"]; ?>"></a>
                        <h3><?php echo $row_recipe["recipe_name"]; ?></h3>
<!--                        <a href="login.php?id=<?php echo $row_recipe["id"]; ?>"><i style='font-size:24px' class='fas'>&#xf303;</i></a>
                        <a href="login.php?id=<?php echo $row_recipe["id"]; ?>"><i class='fas fa-trash' style='font-size:24px;color: red'></i></a>-->
                        
                        
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
<!--                        echo '<a id=' . $row_recipe["id"] . '>';
                        echo '<img src="images/' . $row_recipe["photo"] . '" width="150" height="150">';
                        echo "<h3> Recipe Name: " . $row_recipe["recipe_name"] . ".</h3>";
                        echo "<h3> Preparation Time: " . $row_recipe["prep_time"] . ".</h3>";
                        echo "<h3> Cook Time: " . $row_recipe["cook_time"] . ".</h3>";
                        echo "<h3> Serving: " . $row_recipe["serving"] . ".</h3>";
                        echo "<h3> Description: " . $row_recipe["description"] . ".</h3>";
                        echo "<h3> Ingredients: " . $row_recipe["ingredients"] . ".</h3>";
                        echo "<h3> Methods: " . $row_recipe["methods"] . ".</h3>";-->
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
