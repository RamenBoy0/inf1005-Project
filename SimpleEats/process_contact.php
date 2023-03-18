<?php
$errorMsg = $fname = $message = "";
$success = true;

if(empty($_POST["message"]))
{
    $errorMsg .= "Message is required.<br>";
    $success = false;
}
 else {
     $fname = sanitize_input($_POST["message"]);
}

if(empty($_POST["fname"]))
{
    $errorMsg .= "First name is required.<br>";
    $success = false;
}
 else {
     $fname = sanitize_input($_POST["fname"]);
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
    global $message, $fname, $email, $errorMsg, $success;
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
        // Prepare the statement:
        $stmt = $conn->prepare("INSERT INTO world_of_food_message (message, fname, email) VALUES (?, ?, ?)");
        
        // Bind & execute the query statement:
        $stmt->bind_param("ssss", $message, $fname, $email);
        $message = $_POST['message'];
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        
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
         echo "<h1>Your message is sent!</h1>";
         echo "<h1>Thank you for contacting us, " .$fname. "<br></h1>";
         echo "<a href='contactus.php' class = 'btn btn-success'>Leave another message</a>";
        }
        
        else
        {
         echo "<h1> Oops!</h1>";
         echo "<h2>The following input errors were detected:</h2>";
         echo "<p>" .$errorMsg. "</p>";
         echo "<a href='contactus.php' class = 'btn btn-danger'>Leave a message</a>"; 
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
