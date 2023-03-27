<?php

$errorMsg = $success = "";
$searchErr = '';
                
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
    if (isset($_POST['query'])) {
        $email = $_SESSION["email"];
        $Search_Query = $_POST['query'];
        
//        $stmt= $conn->prepare("SELECT DISTINCT recipe_name FROM world_of_food_recipes WHERE LOWER(recipe_name) like LOWER('%?%')");
//        $stmt->bind_param("s", $Search_Query);
//        $stmt->execute();
//        $result= $stmt->get_result();
        
        $query = "SELECT DISTINCT recipe_name FROM world_of_food_recipes WHERE LOWER(recipe_name) like LOWER('%$Search_Query%')";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#" class="list-group-item list-group-item-action border-1" style="font-size:14px;">' . $row['recipe_name'] . '</a>';

            }

        } else {
              echo '<p class="list-group-item border-1"  style="font-size:14px;">No Record.</p>';
        }
        
    }
}
