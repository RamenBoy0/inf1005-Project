<?php
session_start();
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>


<!doctype html>
<html lang = "en">
    <head>
    <?php include "header_nav_footer.php"?>
        <link rel="stylesheet" href="css/register.css">
        <script defer src="js/update_recipe.js"></script>
        
    </head>
        <header><?php include "navbar.php";?></header>
        
        
        
                    <?php
                $errorMsg = $success = "";
                $member_id = $_GET["member_Id"];
                
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
                  
                    $query = "SELECT * FROM world_of_food_members WHERE email = '$email'";
                    $result = mysqli_query($conn, $query);  
                    $row = mysqli_fetch_assoc($result);
                }
            ?>
        
    <main class="container">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      
    <h1>Change Password</h1>
        <form action="process_change_password.php?id=<?php echo $row['member_Id']; ?>" method="post" enctype="multipart/form-data" novalidate>
            
         <div class="form-group">
                    <input type="hidden" name="id" class="txtField" value="<?php echo $row['member_Id']; ?>">
                    
        </div>   
            
        <div class="form-group">
            <label for="current_pwd">Current Password:</label>
            <input type="password" id="current_pwd" required maxlength="45" name="current_pwd"
                placeholder="Current password" class="form-control">
        </div>
            
        <div class="form-group">
            <label for="pwd">New Password:</label>
            <input type="password" id="pwd" required maxlength="45" name="pwd"
                placeholder="New password" class="form-control">
        </div>
            
       <div class="form-group">
            <label for="pwd_confirm">Confirm New Password:</label>
            <input type="password" id="pwd_confirm" required maxlength="45" name="confirm_pwd"
                placeholder="Confirm password" class="form-control">
        </div>
            
        <button type="submit" class = "btn btn-primary">Change Password</button>
        </form>
    </main>

        <footer>
            <?php include "footer.php" ?>;
        </footer>
 ?>
</body>