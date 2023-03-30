<!DOCTYPE html>
<html lang="en">
    <head>
             <?php
            include "header_nav_footer.php";
            ?>
        <link rel="stylesheet" href="css/add_recipe.css">
        <script defer src="js/add_recipe.js"></script>
        <script defer src="js/update_recipe.js"></script>
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
                $recipe_id = $_GET["id"];
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

                    $query = "SELECT * FROM world_of_food_recipes WHERE id = '" . $recipe_id . "'ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);  
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
            <?php
//            $status = "";
//            if(isset($_POST['update']))
//            {
//                $rname = $_POST['recipe_name'];
//                $prep = $_POST['prep_time'];
//                $cook = $_POST['cook_time'];
//                $serving = $_POST['serving'];
//                $description = $_POST['description'];
//                $ingredients = $_POST['ingredients'];
//                $methods = $_POST['methods'];
//                $upload = $_POST['photo'];
//                $update="update world_of_food_recipes set recipe_name='".$rname."',name='".$name."', age='".$age."',submittedby='".$submittedby."' where id='".$recipe_id."'";
//                mysqli_query($con, $update) or die(mysqli_error());
//                $status = "Record Updated Successfully. </br></br>
//                <a href='view.php'>View Updated Record</a>";
//                echo '<p style="color:#FF0000;">'.$status.'</p>';
//            }

           ?>
                <br><br><br>
                <h1>Update Recipe </h1>
                <div class="form-group">
                    <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
                    
                </div>
         
               
            <p>
                For more recipe  
                <a href="western.php">click here</a>.
            </p>
            <form action="process_update_recipe.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data" novalidate>

            <div class="form-group">
            <label for="upload">Upload Photo:</label>
            <input type="file" id="upload" accept="image/*" name="upload" required >
            <img id="blah"  src='images/<?php echo $row["photo"]; ?>' height="150" width="150" alt="your image" />
            <br><br>
<!--            <p>Original Photo: <img src='images/<?php echo $row["photo"]; ?>' height="150" width="150"/></p>-->
            </div>
                <div class="form-group">
                    <label for="rname">Name:</label>
                    <input class="form-control" maxlength="200" type="text" id="rname"
                        name="rname" placeholder="Enter Name" value="<?php echo $row['recipe_name'];?>">
                </div>
      
                <div class="grid-container">
                    <div class="form-group">
                    <label for="prep">Prep time (minutes):</label>
                    <input class="form-control grid-item" type="number" id="prep" required name="prep" min="1" max="30" placeholder="Prep Time" value="<?php echo $row['prep_time'];?>">
                    </div>

                    <div class="form-group">
                    <label for="prep">Cook time (minutes):</label>
                    <input class="form-control grid-item" type="number" id="cook" required name="cook" min="1" max="60" placeholder="Cook Time" value="<?php echo $row['cook_time'];?>">
                    </div>

                    <div class="form-group">
                    <label for="serving">Serving:</label>
                    <input class="form-control grid-item" type="number" id="serving" required name="serving" min="1" max="5" placeholder="Serving" value="<?php echo $row['serving'];?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description: </label>
                    <div class="rightside" id="counter"></div>
                    <textarea class="form-control" maxlength="500" id="description"
                        required name="description" placeholder="Enter Description"><?php echo $row['description'];?></textarea>
                </div>
              
                
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <div class="rightside" id="counter2"></div>
                    <textarea class="form-control" maxlength="1000" rows="5" id="ingredients"
                        required name="ingredients" placeholder="Enter Ingredients"><?php echo $row['ingredients'];?></textarea>
                </div>
                
                <div class="form-group">
                    <label for="methods">Methods:</label>
                    <div class="rightside" id="counter3"></div>
                    <textarea class="form-control" maxlength="5000" rows="10" id="methods"
                        required name="methods" placeholder="Enter Methods"><?php echo $row['methods'];?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name ="submit" value = "Upload Image">Update</button>
                </div>
                </form>

            <br><br>
            </section>
        </main>
        <footer>
        <?php
        include "footer.php";
        ?>
        </footer>
    </body>


</html>
