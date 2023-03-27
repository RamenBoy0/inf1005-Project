<!doctype html>
<html lang="en">
    <head>
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
       
        <main class="container" id="add_recipe">
            <section>

                
                
            <?php
            $errorMsg = $success = "";
           
            $recipe_id = $_POST["id"];
            $email = $_SESSION["email"];

            
            $rname = $errorMsg = "";
            $success = true;
            if (empty($_POST["rname"]))
            {
                $errorMsg .= "Recipe Name is required.<br>";
                $success = false;
            }
            else
            {
                $rname = sanitize_input($_POST["rname"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($rname, FILTER_DEFAULT))
                {
                $errorMsg .= "Invalid recipe name format.";
                $success = false;
                }
            }
            
            $upload = $errorupload = "";
            $targetDir = "/var/www/html/SimpleEatsss/images/";
            $fileName = basename($_FILES["upload"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if (empty($_FILES["upload"]))
            {
                $errorupload .= "Upload is required.<br>";
                $success2 = false; 
            }
            else{
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if($fileName){
                    if(in_array($fileType, $allowTypes)){
                        move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath);
                        $success2 = true;
                    }
                    else{
                        $errorupload .= "Wrong file type, only accept 'jpg','png','jpeg','gif','pdf'";
                        $success2 = false;
                    }
                }
                else{
                    $msg = $check = "";
                    $recipe_id = $_GET["id"];
                    // Create database connection.
                    $config = parse_ini_file('../../private/db-config.ini');
                    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                    // Check connection
                    if ($conn->connect_error) {
                        $msg = "Connection failed: " . $conn->connect_error;
                        $check = false;
                    } 
                    else 
                    {
                        $query = "SELECT * FROM world_of_food_recipes WHERE id = '" . $recipe_id . "'ORDER BY id DESC";
                        $result = mysqli_query($conn, $query);  
                        $row = mysqli_fetch_assoc($result);
                    }
                    
                    $fileName=$row['photo'];
                    $success2 = true;
                }
            }
            
            
            
            $prep = $errorprep = "";
            $success3 = true;
            if (empty($_POST["prep"]))
            {
                $errorprep .= "Preparation time is required.<br>";
                $success3 = false;
            }
            else
            {
                $prep = sanitize_input($_POST["prep"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($prep, FILTER_DEFAULT))
                {
                $errorprep .= "Invalid preparation time format.";
                $success3 = false;
                }
            }
            
            $cook = $errorcook = "";
            $success4= true;
            if (empty($_POST["cook"]))
            {
                $errorcook .= "Cooking time is required.<br>";
                $success4 = false;
            }
            else
            {
                $cook = sanitize_input($_POST["cook"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($cook, FILTER_DEFAULT))
                {
                $errorcook .= "Invalid cooking time format.";
                $success4 = false;
                }
            }
            
            
            $serving = $errorserving = "";
            $success5= true;
            if (empty($_POST["serving"]))
            {
                $errorserving .= "Serving is required.<br>";
                $success5 = false;
            }
            else
            {
                $serving = sanitize_input($_POST["serving"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($serving, FILTER_DEFAULT))
                {
                $errorserving .= "Invalid serving format.";
                $success5 = false;
                }
            }
            
            $description = $errordescription = "";
            $success6 = true;
            if (empty($_POST["description"]))
            {
                $errordescription .= "Description is required.<br>";
                $success6 = false;
            }
            else
            {
                $description = sanitize_input($_POST["description"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($description, FILTER_DEFAULT))
                {
                $errordescription .= "Invalid description format.";
                $success6 = false;
                }
            }
            
            
            $ingredients = $erroringredients = "";
            $success7 = true;
            if (empty($_POST["ingredients"]))
            {
                $erroringredients .= "Ingredients is required.<br>";
                $success7 = false;
            }
            else
            {
                $ingredients = sanitize_input($_POST["ingredients"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($ingredients, FILTER_DEFAULT))
                {
                $erroringredients .= "Invalid ingredients format.";
                $success7 = false;
                }
            }
            
            
            $methods = $errormethods = "";
            $success8 = true;
            if (empty($_POST["methods"]))
            {
                $errormethods .= "Methods is required.<br>";
                $success8 = false;
            }
            else
            {
                $methods = sanitize_input($_POST["methods"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($methods, FILTER_DEFAULT))
                {
                $errormethods .= "Invalid methods format.";
                $success8 = false;
                }
            }
            
  
            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            if (!$success or !$success2 or !$success3 or !$success4 or !$success5 or !$success6 or !$success7 or !$success8){
                
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<h1>Oops!</h1>";
                echo "<h2>The following input errors were detected:</h2>";
                
                if (!$success){
                    echo "<p>" . $errorMsg . "</p>";
                }
                if (!$success2){
                    echo "<p>" . $errorupload . "</p>";
                }
                if (!$success3){
                    echo "<p>" . $errorprep . "</p>";
                }
                if (!$success4){
                    echo "<p>" . $errorcook . "</p>";
                }
                if (!$success5){
                    echo "<p>" . $errorserving . "</p>";
                }
                if (!$success6){
                    echo "<p>" . $errordescription . "</p>";
                }
                if (!$success7){
                    echo "<p>" . $erroringredients . "</p>";
                }
                if (!$success8){
                    echo "<p>" . $errormethods . "</p>";
                }
         
                printf(' <a href="update_recipe.php?id=' .$recipe_id. '">
                <button style="background-color: red;border-color: white;" class="btn btn-primary">Return to Add Recipe</button>
                </a>');
                
            }
            else{
                
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
                    
                    
                    if(count($_POST)>0) {
                        
                        $stmt = $conn->prepare("UPDATE world_of_food_recipes set recipe_name=?, prep_time=?, cook_time=?, serving=?, description=?, ingredients=?, methods=?, photo=? WHERE id='" . $recipe_id . "'");
                        
                        $stmt->bind_param("siiissss", $_POST['rname'], $_POST['prep'], $_POST['cook'], $_POST['serving'], $_POST['description'], $_POST['ingredients'], $_POST['methods'], $fileName);
                        $stmt->execute();
                        $message = "Record Modified Successfully";
                        
                        echo "<br><br><br>";
                        echo "<h1>" . $message . "</h1>";
                        echo "<h2>Recipe Name: ".$rname."</h2>";

                        echo "<a href='index.php' class = 'btn btn-success'>Back to home page</a>";
                    }


                    $query = "SELECT * FROM world_of_food_recipes WHERE id = '" . $recipe_id . "'ORDER BY id DESC";
                    $result = mysqli_query($conn, $query);  
                    $row = mysqli_fetch_assoc($result);
                }
 
            }
           
            ?>

                <br><br><br>    
                

    
                
                
            <br><br>

            </section>
        </main>
        <?php
        include "footer.php";
        ?>
    </body>


</html>
