<html lang="en">
    <head>
    <script defer src="js/favourite_delete_recipe.js"></script>
        <link rel="stylesheet" href="css/recipes.css">
        <link rel="stylesheet" href="css/pagination.css">
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
    
    $stmt= $conn->prepare("SELECT s.recipe_name, s.email, s.photo, s.prep_time, s.cook_time, s.serving, f.recipe_id FROM world_of_food_recipes as s LEFT JOIN world_of_food_favourites as f ON f.recipe_id = s.id WHERE f.user_id =?");
    $stmt->bind_param("i", $member_id);
    $stmt->execute();
    $favourite = $stmt->get_result();
//    $favourite_query = "SELECT s.recipe_name, s.email, s.photo, f.recipe_id FROM world_of_food_recipes as s LEFT JOIN world_of_food_favourites as f ON f.recipe_id = s.id WHERE f.user_id = ".$member_id."";
//    $favourite = mysqli_query($conn, $favourite_query);
   
    $conn->close();

        ?>
        
<main class="cuisine-container">
            <div class="header-section">
               <h1>Favourite Recipes</h1>
           </div>
    <br>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($favourite)) {
        ?>
        
        <article class="col-sm">
            <strong><h4><?php echo $row['recipe_name']; ?></h4></strong>
        
            <div class="space">
            <figure class="container2">
                                       
                <a href="#" onclick="deleteFromFavorites(<?php echo $row['recipe_id']; ?>)" class="heart-icon fas fa-heart fa-3x"></a>
            <img src='images/<?php echo $row["photo"]; ?>'>
  
              <i>
                  <div class="overlay" style="width:300px;">
                  <?php echo "Recipe by: ", strstr($row['email'], '@', true); ?>
                 </div>
              </i>
           
            </figure>
            
            <figcaption
            <?php echo "<p>Prep Time: {$row['prep_time']} min | Cook Time: {$row['cook_time']} min | Serving: {$row['serving']}</p>"; ?>
               
            
            <div class="button">
                <a href="<?php if ($_SESSION["logged_in"] == true): ?>view_all_recipe_details.php?id=<?php echo $row['recipe_name'];?>
                   <?php elseif($_SESSION["logged_in"] == false):?>login.php <?php endif; ?>">View Recipe</a>
            </div>
        </article>
        <?php
        }
        if (mysqli_num_rows($favourite) == 0) {
            echo "<h5>No recipes created yet.</h5>";
        }
        ?>
        </div>
    
      <div class="center">
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM world_of_food_favourites";   
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
         echo "</br>";  
         
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='favourites.php?page=".($page-1)."'>  &#8249; </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='favourites.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='favourites.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='favourites.php?page=".($page+1)."'>  &#8250; </a>";   
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

        
        

