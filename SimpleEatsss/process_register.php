<?php
$errorMsg = $fname = $lname = $pwd_h = $upload= "";
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
     $pwd_hashed = password_hash($_POST["pwd"], PASSWORD_DEFAULT);
        
    }
    
}

            
            $targetDir = "/var/www/html/SimpleEatsss/images/";
            $fileName = basename($_FILES["upload"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
            if (empty($_FILES["upload"]))
            {
                $errorMsg .= "Upload is required.<br>";
                $success = false; 
            }
            else{
                $allowTypes = array('jpg','png','jpeg','gif','pdf');
                if(in_array($fileType, $allowTypes)){
                    // Upload file to server
                    move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFilePath);
                    $success = true;
                }
                else{
                    $errorMsg .= "Wrong file type, only accept 'jpg','png','jpeg','gif','pdf' ";
                    $success = false;
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
    global $fname, $lname, $email, $pwd_hashed, $fileName,$errorMsg, $success;
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
        
        $email_query = "SELECT email FROM world_of_food_members WHERE email = '" . $email . "'";
        $result_email = mysqli_query($conn, $email_query);
        $email_unique = mysqli_fetch_assoc($result_email)['email'];
        if ($_POST['email'] == $email_unique){
            $errorMsg = "Email already exists";
            $success = false;    
        }
        
        else{
        
        
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO world_of_food_members (fname, lname, email, password, upload) VALUES (?, ?, ?, ?, ?)");
        
        // Bind & execute the query statement:
        $stmt->bind_param("sssss", $fname, $lname, $email, $pwd_hashed, $fileName);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pwd_hashed = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
        $fileName = basename($_FILES["upload"]["name"]);
        $success = true;
        }
        if (!$stmt->execute())
        {
            $errorMsg = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $success = false;
        }
        $stmt->close();
    }
    $conn->close();
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
        <footer>
        <?php
        include "footer.php"
        ?>
        </footer>
        </body>
</html>