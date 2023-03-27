<?php
session_start();
date_default_timezone_set('Asia/Singapore');
$fname = $_SESSION["name"];
//$recipe_id = $_GET["recipe_id"];

// Create database connection.
$config = parse_ini_file('../../private/db-config.ini');
$conn = new mysqli($config['servername'], $config['username'], 
        $config['password'], $config['dbname']);

// Check connection
if ($conn->connect_error)
{
    $errorMsg = "Connection failed: " . $conn->connect_error;
    $success = false;
//    echo("Test1");
}
else
{
//        echo("Recipe_id");
//        echo($recipe_id);
        // Sanitize input data
        $user_rating = $_POST["rating_data"];
//        echo($user_rating);
        $user_review = $_POST["user_review"];
//        echo($user_review);
        date_default_timezone_set('Asia/Singapore');
        $datetime= date("Y-m-d H:i:s");
//        echo($datetime);
//        echo($fname);

        // Prepare and execute SQL statement
//        echo("Test3");
//        echo($recipe_id);
        $stmt = $conn->prepare("INSERT INTO world_of_food_ratings(fname, user_rating, user_review, date) VALUES (?, ?, ?, ?)");

        $stmt->bind_param("siss", $fname, $user_rating, $user_review, $datetime);
        $stmt->execute();

        // Check if the statement was successful
//        echo("Test4");
        if ($stmt->affected_rows > 0) {
            echo("Successful");
        }

        
        if(isset($_POST["action"]))
{
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

        $stmt= $conn->prepare("SELECT * FROM world_of_food_ratings ORDER BY ratings_id DESC");
        $stmt->execute();
        $result_recipe = $stmt->get_result();

	while($row = mysqli_fetch_assoc($result_recipe))
	{
		$review_content[] = array(
			'fname'		=>	$row["fname"],
			'user_review'	=>	$row["user_review"],
			'rating'		=>	$row["user_rating"],
			'datetime'		=>	$row["date"]
		);

		if($row["user_rating"] == '5')
		{
			$five_star_review++;
		}

		if($row["user_rating"] == '4')
		{
			$four_star_review++;
		}

		if($row["user_rating"] == '3')
		{
			$three_star_review++;
		}

		if($row["user_rating"] == '2')
		{
			$two_star_review++;
		}

		if($row["user_rating"] == '1')
		{
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating'	=>	number_format($average_rating, 1),
		'total_review'		=>	$total_review,
		'five_star_review'	=>	$five_star_review,
		'four_star_review'	=>	$four_star_review,
		'three_star_review'	=>	$three_star_review,
		'two_star_review'	=>	$two_star_review,
		'one_star_review'	=>	$one_star_review,
		'review_data'		=>	$review_content
	);

	echo json_encode($output);

}
}
?>