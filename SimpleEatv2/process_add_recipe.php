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
            $targetDir = "/var/www/html/SimpleEat/images/";
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
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath);
                    $success2 = true;
                }
                else{
                    $errorupload .= "Wrong file type, only accept 'jpg','png','jpeg','gif','pdf' ";
                    $success2 = false;
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
                
                $link = 'add_recipe.php';
                printf(' <a href="' .$link. '">
                <button style="background-color: red;border-color: white;" class="btn btn-primary">Return to Add Recipe</button>
                </a>');
                
            }
            else{
                
               if ($_SERVER["REQUEST_METHOD"] == "POST")
               {
                    saveRecipeToDB();
               }
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<h1>You have successfully added a recipe.</h1>";
                echo "<br>";
                echo "<h2> Thank you. Recipe Name: " . $rname . ".</h2>";
                echo "<br>";
                
                $link = 'index.php';
                printf(' <a href="' .$link. '">
                <button style="background-color: green;border-color: white;" class="btn btn-primary">Home</button>
                </a>');
                
            }
            
            
            
            //Helper function that checks input for malicious or unwanted content.
            function sanitize_input($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            
            function saveRecipeToDB()
            {
                global $rname, $prep, $cook, $serving, $description, $ingredients, $methods, $fileName, $email;
                
                 $config = parse_ini_file('../../private/db-config.ini');
                 $conn = new mysqli($config['servername'], $config['username'], 
                 $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error)
                {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                }
                else    
            {
                $stmt = $conn->prepare("INSERT INTO world_of_food_recipes (recipe_name, prep_time, cook_time, serving, description, ingredients, methods, photo, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("siiisssss", $rname, $prep, $cook, $serving, $description, $ingredients, $methods, $fileName, $email);
                if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
         $stmt->close();
    }
    $conn->close();
            }
            ?>
            
            <br><br>
            </section>
        </main>
        <?php
        include "footer.php";
        ?>
    </body>


</html>
