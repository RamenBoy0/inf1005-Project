<?php
session_start();
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$recipe_name = $_GET["id"];
?>

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
                    
                    // Retrieve all rows from the world_of_food_recipes table that match the recipe name
                    
                    $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes WHERE recipe_name =?");
                    $stmt->bind_param("s", $recipe_name);
                    $stmt->execute();
                    $result_recipe = $stmt->get_result();
                    // Loop through the results and print them out
                    while ($row_recipe = mysqli_fetch_assoc($result_recipe)) {
                        
                    ?>
                        
                    <section class="recipe-info">
                        
                        <a id="<?php echo $row_recipe["id"]; ?>"></a>
                        <h3><?php echo $row_recipe["recipe_name"]; ?></h3>
                        
                        
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
