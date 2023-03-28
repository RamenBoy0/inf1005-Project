<?php
session_start();
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>

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
       
          
            <?php 
              
                $config = parse_ini_file('../../private/db-config.ini');
                $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
                // Check connection
                if ($conn->connect_error) {
                    $errorMsg = "Connection failed: " . $conn->connect_error;
                    $success = false;
                } 
                else {
                    $query = "SELECT * FROM world_of_food_members WHERE email = '$email'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
            
            ?>
                
            <main class="cuisine-container">
                
                <div class="header-section">
                <h1>Profile</h1>
                </div>
                
                <div class="profile-container" >
                    
                    <div class ="image-section">
                        <img src='images/<?php echo $row["upload"]; ?>'>
                    </div>
                    
                    <div class="content-section">
                       
                        <h5>First Name : <?php echo $row['fname']; ?></h5><br>
                        <h5>Last Name : <?php echo $row['lname']; ?></h5><br>
                        <h5>Email : <?php echo $row['email']; ?></h5><br>
                        
                        <div class="button">
                        <a href="profile_edit.php?id=<?php echo $row['member_id']; ?>" >Edit Profile</a>
                        </div>
                
                        <div class="button">
                        <a href="profile_change_password.php?id=<?php echo $row['member_Id']; ?>">Change Password</a>
                        </div>
                        
                    </div>
                    
                </div>
                
            <?php
                }
            ?>
                
            </main>   
    </body>
    
    <footer>
        <?php
            include "footer.php";
        ?>
    </footer>


</html>
