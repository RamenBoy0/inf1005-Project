<!doctype html>
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
        
        <div class="form-container">
            <section>
                <br><br><br>
            <h1>Add Recipe</h1>
            <p>
                For more recipe  
                <a href="recipe_details_home.php">click here</a>.
            </p>
            <form action="process_add_recipe.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data" novalidate>

            <div class="form-group">
            <label for="upload">Upload Photo:</label>
            <input type="file" id="upload" accept="image/*" name="upload" value="<?php echo $row['photo'];?>" required placeholder="Upload Photo">
            <img id="blah"  src='' height="150" width="150" alt="your image" />
            <br><br>
            </div>
                <div class="form-group">
                    <label for="fname">Name:</label>
                    <input class="form-control" maxlength="200" type="text" id="rname"
                        required name="rname" placeholder="Enter Name">
                </div>
      
                <div class="grid-container">
                    <div class="form-group">
                    <label for="prep">Prep time (minutes):</label>
                    <input class="form-control grid-item" type="number" id="prep" required name="prep" min="1" max="30" placeholder="Prep Time">
                    </div>

                    <div class="form-group">
                    <label for="prep">Cook time (minutes):</label>
                    <input class="form-control grid-item" type="number" id="cook" required name="cook" min="1" max="60" placeholder="Cook Time">
                    </div>

                    <div class="form-group">
                    <label for="serving">Serving:</label>
                    <input class="form-control grid-item" type="number" id="serving" required name="serving" min="1" max="5" placeholder="Serving">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="description">Description: </label>
                    <div class="rightside" id="counter"></div>
                    <textarea class="form-control" maxlength="500" type="text" id="description"
                        required name="description" placeholder="Enter Description"></textarea>
                </div>
              
                
                <div class="form-group">
                    <label for="ingredients">Ingredients:</label>
                    <div class="rightside" id="counter2"></div>
                    <textarea class="form-control" maxlength="1000" rows="5" type="text" id="ingredients"
                        required name="ingredients" placeholder="Enter Ingredients"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="methods">Methods:</label>
                    <div class="rightside" id="counter3"></div>
                    <textarea class="form-control" maxlength="5000" rows="10" type="text" id="methods"
                        required name="methods" placeholder="Enter Methods"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" name ="submit" value = "Upload Image">Submit</button>
                </div>
                </form>
            </section>
        </div>
        <?php
        include "footer.php";
        ?>
    </body>


</html>
