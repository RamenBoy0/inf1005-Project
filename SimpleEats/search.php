<!doctype html>
<html lang="en">
    <head>
             <?php
            include "header_nav_footer.php";
            ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/script.js"></script>
         <link rel="stylesheet" href="css/cuisines.css">
        
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
                        if(!empty($_POST['search']))
                        {
                            $search = sanitize_input($_POST['search']);
                            $query = "SELECT * FROM world_of_food_recipes WHERE email in ('" . $email . "', 'SimpleEats@hotmail.com') AND LOWER(recipe_name) like LOWER('%$search%')";
                            $result = mysqli_query($conn, $query);  
                            
                        }
                        else
                        {
                            $searchErr = "Please enter the information";
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
              <div id="searching">
                <div class="row justify-content-center">
                   
                    <div class="col-6 text-center">
                        <form action="#" method="post">
                            <div class="input-group">
                                
                                <input placeholder="Recipe Search Here" type="text" name="search" value="" id="search" class="form-control form-control-lg" autocomplete="off">
                                <button type="submit" name="submit" value="Submit" class="input-group-text btn-success px-4"><i class="fa fa-search"></i></button>
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
                    <h5><?php echo $row['recipe_name']; ?></h5>
                    <figure>
                        <img src='images/<?php echo $row["photo"]; ?>' />
                    </figure>
                    <div class="button">
                        <a href="recipe_details.php#<?php echo $row["id"]; ?>" >View Recipe</a>
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
       
    </body>
   

</html>
