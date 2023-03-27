<?php
session_start();
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$email = $_SESSION["email"];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile</title>

        <!--Swiper Bundle is a JS library used to do the interactive slider-->
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

        <!--Library used to generate the icons and fonts-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

        <!--jQuery-->
        <script defer
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous">
        </script>

         <link rel="stylesheet" 
         href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
         integrity=
         "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
         crossorigin="anonymous">

        <!--Bootstrap JS-->
        <script defer
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
        integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
        crossorigin="anonymous">          
        </script>
        <script defer src="js/home.js"></script>
        <link rel="stylesheet" href="css/nav_footer.css">
        <link rel="stylesheet" href="css/profile.css">


        <!-- Custom JS -->
        <script defer src="js/favourite_recipe.js"></script>
        <link rel="stylesheet" href="css/cuisines.css">


  
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
                <h3>Profile</h3>
                <br>
                <div class="profile-container" style="display: flex;align-items: center;">
                    <figure>
                        <img src='images/<?php echo $row["upload"]; ?>' style="height:400px;width:400px;border-radius: 50%;">
                    </figure>
                    <div class="profile-details" style="display: flex;flex-direction: column;margin-left: 50px;">
                       
                        <h5>First Name : <?php echo $row['fname']; ?></h5><br>
                        <h5>Last Name : <?php echo $row['lname']; ?></h5><br>
                        <h5>Email : <?php echo $row['email']; ?></h5><br>
                        
                        <div class="button">
                        <a href="profile_edit.php?id=<?php echo $row['member_id']; ?>" style="margin-right: 30px;">Edit Profile</a>
                        <a href="profile_change_password.php?id=<?php echo $row['member_Id']; ?>">Change Password</a>
                        </div>
                        
                    </div>
                </div>
                
     

                 
            <?php
                }
            ?>
                
            </main>
       

        <footer>
        <?php
            include "footer.php";
        ?>
        </footer>
    </body>


</html>
