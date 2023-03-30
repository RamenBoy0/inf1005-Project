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
                $member_id = $_GET["member_id"];
                
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
      
    <h1>Edit Profile</h1>
        <form action="process_edit_profile.php?id=<?php echo $row['member_id']; ?>" method="post" enctype="multipart/form-data" novalidate>
                <div class="form-group">
                    <input type="hidden" name="id" class="txtField" value="<?php echo $row['member_id']; ?>">
                    
                </div>
            <div class="form-group">
            <label for="upload">Upload Photo:</label>
            <input type="file" id="upload" accept="image/*" name="upload1" required>
            <img id="blah"  src='images/<?php echo $row["upload"]; ?>' height="150" width="150" alt="your image">
            </div>
            
        <div class ="form-group">
         
            <label for="fname">First Name:</label>
            <input class="form-control" type="text" id="fname" name="fname"
                placeholder="Enter first name" value="<?php echo $row['fname']; ?>">
        </div>
            
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" required maxlength="45" name="lname"
                placeholder="Enter last name" class="form-control" value="<?php echo $row['lname']; ?>">
        </div>
            
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" required maxlength="45" name="email"
                placeholder="Enter email" class="form-control" value="<?php echo $row['email'];?>" readonly="readonly">
        </div>

        <button type="submit" class = "btn btn-primary">Edit</button>
        </form>
    </main>

        <footer>
            <?php include "footer.php" ?>;
        </footer>
 ?>
</body>