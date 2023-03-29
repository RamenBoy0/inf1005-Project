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
    <script defer src="js/delete_member.js"></script>
    </head>
 
    <body>
        <header>
             <?php
            include "navbar.php";
            ?>
        </header>
        
                                                <!-- Create the modal -->
    <div class="modal fade" id="delete-member-modal" tabindex="-1" role="dialog" aria-labelledby="favorite-member-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="favorite-member-modal-label">Close Account</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            
                    <p>Do you want to close account?</p>
                    <input type="hidden" id="member-id" name="member-id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="delete-member-btn">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
       
          
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
                        <a href="profile_edit.php?id=<?php echo $row['member_id']; ?>" style="margin-right: 30px;">Edit</a>
                        </div>
                        
                        <div class="button">
                        <a href="profile_change_password.php?id=<?php echo $row['member_Id']; ?>" style="margin-right: 30px;">Change Password</a>
                        </div>
                        
                        <div class="button">
                        <a href="#" data-toggle="modal" data-target= "#delete-member-modal" onClick="setMemberId(<?php echo $row["member_id"]; ?>)">Close Account</a>
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
