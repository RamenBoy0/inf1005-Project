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
           
            <?php           
            
            $user_id = $_GET["id"];
            $email = $_SESSION["email"];
            
            $pwd = $error = "";
            $success = true;
            if (empty($_POST["current_pwd"]))
            {
                $error .= "Current Password is required.<br>";
                $success = false;
            }
            else
            {
                $curr_pwd_hashed = password_hash($_POST["current_pwd"], PASSWORD_DEFAULT);

            }
            
            
            
            $pwd1 = $errorpwd = "";
            $success2 = true;
            if (empty($_POST["pwd"]))
            {
                $errorpwd .= "New Password is required.<br>";
                $success2 = false;
            }
            else
            {
                if ($_POST["pwd"] === $_POST["confirm_pwd"]) {
                    $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
                    $pwd_hashed = password_hash($_POST["confirm_pwd"], PASSWORD_DEFAULT);
                }
                else {
                    $errorpwd .= "Passwords do not match<br>";
                    $success2 = false;
                }
            }

            
            if (!$success or !$success2){
                
                echo "<br>";
                echo "<br>";
                echo "<br><br><br>";
                
                echo "<h1>Oops!</h1>";
                echo "<h2>The following input errors were detected:</h2>";
                
                if (!$success){
                    echo "<p>" . $error . "</p>";
                }
                if (!$success2){
                    echo "<p>" . $errorpwd. "</p>";
                }
                
         
                printf(' <a href="profile_change_password.php?id=' .$user_id. '">
                <button style="background-color: red;border-color: white;" class="btn btn-primary">Return to Change Password</button>
                </a>');
                
            }
            else{
                
                $errorMsg = $success3 = "";
                $email = $_SESSION["email"];
                // Create database connection.
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success3 = false;
                } 
                else 
                {
                    if (count($_POST) > 0) {
                        echo "<h1>test</h1>";
                        $sql = "SELECT * FROM world_of_food_members WHERE email= ?";
                        $statement = $conn->prepare($sql);
                        $statement->bind_param('s', $email);
                        $statement->execute();
                        $result = $statement->get_result();
                        $row = $result->fetch_assoc();

                        if (! empty($row)) {
                            $hashedPassword = $row["password"];
                            echo "<h1>" . $row["password"] . "</h1>";
                       
                            //$password = PASSWORD_HASH($_POST["pwd"], PASSWORD_DEFAULT);
                            if (password_verify($_POST["current_pwd"] , $hashedPassword)) {
                                $sql = "UPDATE world_of_food_members set password=? WHERE email=?";
                                $statement = $conn->prepare($sql);
                                $statement->bind_param('ss', $pwd_hashed, $email);
                                $statement->execute();
                                $message = "Password Changed";
                                echo "<br><br><br>";
                                
                                echo "<h1>" . $message . "</h1>";
                                echo "<p>Please kindly login again to try the new password.</p>";
                                echo "<a href='logout.php' class = 'btn btn-success'>Login Again</a>";
                            } else{
                                $message = "Current Password is not correct";
                                echo "<br><br><br>";
                                echo "<h1>Oops!</h1>";
                                echo "<h2>The following input errors were detected:</h2>";
                                echo "<p>" . $message . "</p>";
                                echo "<p>Please login again to ensure that the password has been change. </p>";
                                printf(' <a href="profile_change_password.php?id=' .$user_id. '">
                                <button style="background-color: red;border-color: white;" class="btn btn-primary">Return to Change Password</button>
                                </a>');
                            }
                        }
                    }
                
                }
            
            }
            ?>

            <br><br>
            
        </main>
        <?php
        include "footer.php";
        ?>
    </body>


</html>
