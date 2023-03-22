<?php
$errorMsg = $email = $pwd_h = $fname = "";
$success = true;

function sanitize_input($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (empty($_POST["email"])) {
    $errorMsg .= "Email is required.<br>";
    $success = false;
} else {
    $email = sanitize_input($_POST["email"]);
    // Additional check to make sure e-mail address is well-formed.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg .= "Invalid email format.<br>";
        $success = false;
    }
}

if (empty($_POST["pwd"])) {
    $errorMsg .= "Password is required.<br>";
    $success = false;
} else {
    $pwd_h = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
}

if ($success) {
    // Create database connection.
    $config = parse_ini_file('../../private/db-config.ini');
    $conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
    // Check connection
    if ($conn->connect_error) {
        $errorMsg = "Connection failed: " . $conn->connect_error;
        $success = false;
    } else {
        $email_query = "SELECT email FROM world_of_food_members WHERE email = '" . $email . "'";
        $password_query = "SELECT password FROM world_of_food_members WHERE email = '" . $email . "'";
        $fname_query = "SELECT fname FROM world_of_food_members WHERE email = '" . $email ."'";
        $id_query = "SELECT member_Id FROM world_of_food_members WHERE email = '" . $email ."'";
        
        $result_email = mysqli_query($conn, $email_query);
        $result_password = mysqli_query($conn, $password_query); 
        $result_fname = mysqli_query($conn, $fname_query);
        $result_id = mysqli_query($conn, $id_query);
        $id_confirm = mysqli_fetch_assoc($result_id)['member_Id'];
        $fname_confirm = mysqli_fetch_assoc($result_fname)['fname'];
        
    if (mysqli_num_rows($result_email) == 0) {
            $success = false;
            setcookie("error", "Email not found", time()+3);
        } else {
            $password_hash = mysqli_fetch_assoc($result_password)['password'];
            if (!password_verify($_POST['pwd'], $password_hash)) {
                $success = false;
                setcookie("error", "Password does not match", time()+3);
            }
        }
    }
}
?>
<html lang = "en">
    <head>
        <?php
        include "header_nav_footer.php"
        ?>
    </head>
    <body>
        <header>
        <?php
        include "navbar.php"
        ?>
        </header>
        
    <main class = "container">
        <hr>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <?php
        if ($success)
        {
            
        session_start();
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["id"] = $id_confirm;
        $_SESSION["name"] = $fname_confirm;
        $_SESSION["logged_in"] = true; 
//        header("location:index.php");
            
         echo "<h1>Your login is successful!</h1>";
         echo "<h1>Welcome back ".$fname_confirm."!</h1>";
         
         
         //echo "<h1>Thank you for signing up, " .$fname."<br></h1>";
         echo "<a href='index.php' class = 'btn btn-success'>Back to home page</a>";
        }
        
        else
        {
         echo "<h1> Oops!</h1>";
         echo "<h2>The following input errors were detected:</h2>";
         echo "<p>" .$errorMsg. "</p>";
         echo "<a href='login.php' class = 'btn btn-danger'>Return to Login</a>"; 
        } 
        ?>
    </main>
        <br>
        <br>
        <footer>
        <?php
        include "footer.php"
        ?>
        </footer>
        </body>
</html>
