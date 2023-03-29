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
            $user_id = $_POST["id"];
            $email = $_SESSION["email"];

            
            $lname = $errorMsg = "";
            $success = true;
            if (empty($_POST["lname"]))
            {
                $errorMsg .= "Last Name is required.<br>";
                $success = false;
            }
            else
            {
                $lname = sanitize_input($_POST["lname"]);
                // Additional check to make sure e-mail address is well-formed.
                if (!filter_var($lname, FILTER_DEFAULT))
                {
                $errorMsg .= "Invalid last name format.";
                $success = false;
                }
            }
            
            
            
            $upload = $errorupload = "";
            $targetDir = "/var/www/html/SimpleEatsss/images/";
            $fileName = basename($_FILES["upload1"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if (empty($_FILES["upload1"]))
            {
                $errorupload .= "Upload is required.<br>";
                $success2 = false; 
            }
            else{
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if($fileName){
                    if(in_array($fileType, $allowTypes)){
                        move_uploaded_file($_FILES["upload1"]["tmp_name"], $targetFilePath);
                        $success2 = true;
                    }
                    else{
                        $errorupload .= "Wrong file type, only accept 'jpg','png','jpeg','gif','pdf'";
                        $success2 = false;
                    }
                }
                else{
                    $msg = $check = "";
                    $email = $_SESSION["email"];
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
                        $query = "SELECT * FROM world_of_food_members WHERE email = '$email'";
                        $result = mysqli_query($conn, $query);  
                        $row = mysqli_fetch_assoc($result);
                    }
                    
                    $fileName=$row['upload'];
                    $success2 = true;
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
            
            if (!$success or !$success2){
                
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
                
         
                printf(' <a href="profile_edit.php?id=' .$user_id. '">
                <button style="background-color: red;border-color: white;" class="btn btn-primary">Return to Edit Profile</button>
                </a>');
                
            }
            else{
                
                $errorMsg = $success = "";

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
                        
                        $stmt = $conn->prepare("UPDATE world_of_food_members set fname=?, lname=?, upload=? WHERE email='" . $email . "'");
                        
                        $stmt->bind_param("sss", $_POST['fname'], $_POST['lname'], $fileName);
                        $stmt->execute();
                        $message = "Record Modified Successfully";
                        
                        echo "<br><br><br>";
                        echo "<h1>" . $message . "</h1>";
                        echo "<h4> Hello, " . $_POST['fname'] . " " . $_POST['lname'] . ".</h4>";

                        echo "<a href='index.php' class = 'btn btn-success'>Back to home page</a>";
                    }


                    $query = "SELECT * FROM world_of_food_members WHERE email = '$email'";
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
