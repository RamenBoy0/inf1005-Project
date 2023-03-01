<?php
$errorMsg = $fname = $lname = $pwd_h = "";
$success = true;

if(empty($_POST["fname"]))
{
    $errorMsg .= "First name is required.<br>";
    $success = false;
}
 else {
     $fname = sanitize_input($_POST["fname"]);
}

if (empty($_POST["lname"]))
{
    $errorMsg .= "Last name is required.<br>";
    $success = false;
}
else
{
    $lname = sanitize_input($_POST["lname"]);
}

if (empty($_POST["email"]))
{
    $errorMsg .= "Email is required.<br>";
    $success = false;
}
else
{
 $email = sanitize_input($_POST["email"]);
 // Additional check to make sure e-mail address is well-formed.
 if (!filter_var($email, FILTER_VALIDATE_EMAIL))
 {
 $errorMsg .= "Invalid email format.<br>";
 $success = false;
 }
}

  if (empty($_POST["pwd"]) || empty($_POST["pwd_confirm"]))
{
    $errorMsg .= "Password and confirmation are required.<br>";
    $sucess = false;
}
else
{
    if ($_POST["pwd"] != $_POST["pwd_confirm"])
    {
       $errorMsg .= "Passwords do not match.<br>";
       $success = false;
    }
 else {
     $pwd_h = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        
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

function saveMemberToDB()
{
    global $fname, $lname, $email, $pwd_hashed, $errorMsg, $success;
    // Create database connection.
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
        
        $email_query = "SELECT email FROM world_of_pets_member WHERE email = '" . $email . "'";
        $result_email = mysqli_query($conn, $email_query);
        $email_unique = mysqli_fetch_assoc($result_email)['email'];
        if ($_POST['email'] == $email_unique){
            $errorMsg = "Email already exists";
            $success = false;    
        }
        
        else{
        
        
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO world_of_pets_member (fname, lname, email, password) VALUES (?, ?, ?, ?)");
        
        // Bind & execute the query statement:
        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd_hashed);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pwd_hashed = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        
        if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // Validate form data
    if ($success)
    {
        // Save member to database
        saveMemberToDB();
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
         echo "<h1>Your registration is successful!</h1>";
         echo "<h1>Thank you for signing up, " .$fname. "<br></h1>";
         echo "<a href='login.php' class = 'btn btn-success'>Log-in</a>";
        }
        
        else
        {
         echo "<h1> Oops!</h1>";
         echo "<h2>The following input errors were detected:</h2>";
         echo "<p>" .$errorMsg. "</p>";
         echo "<a href='register.php' class = 'btn btn-danger'>Return to Sign Up</a>"; 
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