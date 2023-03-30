<!doctype html>
<html lang="en">
    <head>
             <?php
            include "header_nav_footer.php";
            ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/search_script.js"></script>
         <link rel="stylesheet" href="css/recipes.css">
        
    </head>
    <body>
        <header>
             <?php
            include "navbar.php";
            ?>
        </header>
       
            <?php
                $errorMsg = $success = "";
                $searchErr = '';
                
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
                    
                    if(isset($_POST['submit']))
                    {
                        if(isset($_POST['submit'])) {
                            if(!empty($_POST['search'])) {
                                $search = sanitize_input($_POST['search']);
                                $orderBy = '';
                                    if(isset($_POST['sortBy'])) {
                                    $sort_order = $_POST['sortBy'];
                                    if($sort_order == 'prep_time') {
                                      $orderBy .= " ORDER BY prep_time ASC";
                                    } elseif($sort_order == 'cook') {
                                      $orderBy .= " ORDER BY cook_time ASC";
                                    } elseif($sort_order == 'serving') {
                                      $orderBy .= " ORDER BY serving DESC";
                                    }
                                  }
//                                $email = "SimpleEats@hotmail.com";
//                                $stmt= $conn->prepare("SELECT * FROM world_of_food_recipes WHERE email in ? AND LOWER(recipe_name) like LOWER('%?%')$orderBy");
//                                $stmt->bind_param("ss", $email, $search);
//                                $stmt->execute();
//                                $result= $stmt->get_result();

                                $query = "SELECT * FROM world_of_food_recipes WHERE email in ('" . $email . "', 'SimpleEats@hotmail.com') AND LOWER(recipe_name) like LOWER('%$search%')"
                                        . "OR LOWER(recipe_name) like LOWER('%$search%')$orderBy";
                                $result = mysqli_query($conn, $query);
                            } else {
                                $searchErr = "Please enter the information";
                            }
                        }
                    }
                }
                
                
                function sanitize_input($data)
                {
                 $data = trim($data);
                 $data = stripslashes($data);
                 $data = htmlspecialchars($data);
                 return $data;
                }
            ?>

          <main class="cuisine-container">
              
              
            <div class="header-section">
                <h1>Search</h1>
            </div>
              <br>
              <div id="searching">
                <div class="row justify-content-center">
                 
                    <div class="col-6 text-center">
                        <form action="#" method="post">
                            <div class="input-group">
                                
                                <input placeholder="Recipe Search Here" type="text" name="search" value="" id="search" class="form-control form-control-lg" autocomplete="off">
                                
                                <select id="sortBy" name="sortBy" class="input-group-text" aria-label="sort" style='font-size: 14px;  color: #495057;background-color: white;text-align: left;'>
                                        <option value="">Sort by</option>
                                        <option id="prep_time" value="prep_time">Quick Preparation</option>
                                        <option id="cook" value="cook">Easy Cooking</option>
                                        <option id="serving" value="serving">Huge Serving</option>
                                </select>
                                
                                <button type="submit" name="submit" value="Submit" class="input-group-text btn-success px-4" aria-label="search_button"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                       
                    </div>
                </div>
              
                <div class="row justify-content-center">
                    <div class="col-6">
                        <div id="show-list"> </div>
                    </div>
                </div> 
                  </div>
              <br><br>
        <div class="row justify-content-center">    
        <?php 
        if(isset($_POST['submit'])){
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                ?>

                <article class="col-sm">
                    <strong><h4><?php echo $row['recipe_name']; ?></h4></strong>

                    <div class="space">
                    <figure class="container2">
                    <img src='images/<?php echo $row["photo"]; ?>' alt="images">

                      <i>
                          <div class="overlay" style="width:300px;">
                          <?php echo "Recipe by: ", strstr($row['email'], '@', true); ?>
                         </div>
                      </i>

                    </figure>
                        
                    <figcaption    
                        <?php echo "<p>Prep Time: {$row['prep_time']} min | Cook Time: {$row['cook_time']} min | Serving: {$row['serving']}</p>"; ?>
                     
                        
                    <div class="button">
                <a href="<?php if ($_SESSION["logged_in"] == true): ?>view_recipe_name.php?id=<?php echo $row['recipe_name'];?>
                   <?php elseif($_SESSION["logged_in"] == false):?>login.php <?php endif; ?>">View Recipe</a>
                    </div>
                </article>

                <?php
                }

            } 
            else {
                  echo '<p class="text-center">No Record</p>';
            }
        
        }
        ?>
            <br><br>
        </div>  
        </main>
        <footer>
        <?php
        include "footer.php";
        ?>
        </footer>
    </body>
    


</html>
