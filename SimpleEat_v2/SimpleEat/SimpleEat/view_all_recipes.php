<html lang="en">
    <head>
        <?php
            include "header_nav_footer.php";
            
        ?>
        <script defer src="js/favourite_recipe.js"></script>
        <link rel="stylesheet" href="css/recipes.css">
        <link rel="stylesheet" href="css/pagination.css">
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
            
            $per_page_record = 6;  // Number of entries to show in a page.   
            // Look for a GET variable page if not found default is 1.        
            if (isset($_GET["page"])) {    
                  $page  = $_GET["page"];    
             }    
             else {    
                   $page=1;    
             }    

            //determine the sql LIMIT starting number for the results on the displaying page  
             $start_from = ($page-1) * $per_page_record; 
            
            
            
            // Create database connection.
            $config = parse_ini_file('../../private/db-config.ini');
            $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
            // Check connection
            if ($conn->connect_error) {
                $errorMsg = "Connection failed: " . $conn->connect_error;
                $success = false;
    } else {
            
            $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result_email = $stmt->get_result();
                
            }
        ?>
        
<main class="cuisine-container">
                    <div class="jumbotron text-center">
               <h1 class="display-2">Latest Recipes</h1>
           </div>
    <br>
    <div class="row">
        <?php 
        while($row = mysqli_fetch_assoc($result_email)) {
        ?>
        
        <article class="col-sm">
            <strong><h4><?php echo $row['recipe_name']; ?></h4></strong>
        
            <div class="space">
            <figure class="container2">
            <img src='images/<?php echo $row["photo"]; ?>'>
  
              <i>
                  <div class="overlay" style="width:300px;">
                  <?php echo "Recipe by: ", strstr($row['email'], '@', true); ?>
                 </div>
              </i>
           
            </figure>
            
            <?php echo "<p>Prep Time: {$row['prep_time']} min | Cook Time: {$row['cook_time']} min | Serving: {$row['serving']}</p>"; ?>
            </div>
            
            <div class="button">
                <a href="<?php if ($_SESSION["logged_in"] == true): ?>view_all_recipe_details.php?id=<?php echo $row['recipe_name'];?>
                   <?php elseif($_SESSION["logged_in"] == false):?>login.php <?php endif; ?>">View Recipe</a>
            </div>
        </article>
        
        <?php
        }
        if (mysqli_num_rows($result_email) == 0) {
            echo "<h5>No recipes created yet.</h5>";
        }
        ?>
        </div>
    
      <div class="center">
     <div class="pagination">    
      <?php  
        $query = "SELECT COUNT(*) FROM world_of_food_recipes";   
        $rs_result = mysqli_query($conn, $query);     
        $row = mysqli_fetch_row($rs_result);     
        $total_records = $row[0];     
          
         echo "</br>";  
         
        // Number of pages required.   
        $total_pages = ceil($total_records / $per_page_record);     
        $pagLink = "";       
      
        if($page>=2){   
            echo "<a href='view_all_recipes.php?page=".($page-1)."'>  &#8249; </a>";   
        }       
                   
        for ($i=1; $i<=$total_pages; $i++) {   
          if ($i == $page) {   
              $pagLink .= "<a class = 'active' href='view_all_recipes.php?page="  
                                                .$i."'>".$i." </a>";   
          }               
          else  {   
              $pagLink .= "<a href='view_all_recipes.php?page=".$i."'>   
                                                ".$i." </a>";     
          }   
        };     
        echo $pagLink;   
  
        if($page<$total_pages){   
            echo "<a href='view_all_recipes.php?page=".($page+1)."'>  &#8250; </a>";   
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

        
        

