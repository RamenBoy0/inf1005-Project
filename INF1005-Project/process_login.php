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
        $email_query = "SELECT email FROM world_of_pets_member WHERE email = '" . $email . "'";
        $password_query = "SELECT password FROM world_of_pets_member WHERE email = '" . $email . "'";
        $fname_query = "SELECT fname FROM world_of_pets_member WHERE email = '" . $email ."'";
        
        $result_email = mysqli_query($conn, $email_query);
        $result_password = mysqli_query($conn, $password_query); 
        $result_fname = mysqli_query($conn, $fname_query);
        $fname_confirm = mysqli_fetch_assoc($result_fname)['fname'];
        
        if (mysqli_num_rows($result_email) == 0) {
            $success = false;
            $errorMsg = "Email Not Found";
        } else {
            $password_hash = mysqli_fetch_assoc($result_password)['password'];
            if (!password_verify($_POST['pwd'], $password_hash)) {
                $success = false;
                $errorMsg = "Password Does Not Match";
            }
        }
    }
}
?>
<html lang = "en">
    <head>
        <!--jQuery script-->
        <script defer
                src ="https://code.jquery.com/jquery-3.4.1.min.js"
                integrity = "sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
                crossorigin = "anonymous">
        </script>
        <script defer
            src = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
            integrity = "sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm"
            crossorigin="anonymous">
        </script>
        <script defer src="js/main.js">
        </script>
        <title>World of Pets</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet"
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity ="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
              crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css" type="text/css">
    </head>
    <body>
        <?php
        include "nav.inc.php"
        ?>
        
    <main class = "container">
        <hr>
        <?php
        if ($success)
        {
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
        <?php
        include "footer.inc.php"
        ?>
        </body>
</html>
