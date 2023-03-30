<!doctype html>
<html lang="en">
    <head>
        <?php include "header_home.php" ?>
    </head>
    <body>
        <header> <?php include "navbar.php" ?> </header>
        
        
                <?php
            $errorMsg = $success = "";
//            $email = $_SESSION["email"];
           
            // Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
            // Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
    } else {
            
            $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes ORDER BY id DESC LIMIT 3");
//            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result_email = $stmt->get_result();
                
            }
        ?>
        
        
        
        
        <main>
        <?php include "slider.php" ?>;
        
        <div class="cuisine-container" style="padding-top: 0px;">

            <section class="dishes" id="dishes">

                
                <h1 class="heading"> Recipe Examples </h1>

              

                       <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($result_email)) {
        ?>
        
        <article class="col-sm">
           <h2 style="font-size:25px;"><?php echo $row['recipe_name']; ?></h2>
                       
            <img src='images/<?php echo $row["photo"]; ?>' alt='top'>

                
            <div class="overlay" style="font-size:15px;">
                <?php echo "Recipe by: ", strstr($row['email'], '@', true); ?>
            </div>
          
            
            <?php echo "<p style='text-align:left;font-size:15px;'>Prep Time: {$row['prep_time']} min | Cook Time: {$row['cook_time']} min | Serving: {$row['serving']}</p>"; ?> 
          
            
         
                <a href="<?php if ($_SESSION["logged_in"] == true): ?>view_all_recipe_details.php#<?php echo $row['id'];?>
                   <?php elseif($_SESSION["logged_in"] == false):?>login.php <?php endif; ?>" class="btn">View Recipe</a>
   
        </article>
        
        <?php
        }
        if (mysqli_num_rows($result_email) == 0) {
            echo "<h5>No recipes created yet.</h5>";
        }
        ?>
        </div>
          </section>
                </div>
        
   
        </main>
        <footer>
            <?php include "footer.php" ?>;
        </footer>
    </body>
</html>
