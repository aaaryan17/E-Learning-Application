
	<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "learned";

	// Create connection
	$dbc = mysqli_connect($servername, $username, $password,$database);

	if(isset($_GET['ID'])) {

		$ID = mysqli_real_escape_string($dbc, $_GET['ID']);

		$sql = "UPDATE `courses` SET `verified` = 'yes' WHERE `courses`.`course_id` = '$ID';";
		$result = mysqli_query($dbc, $sql) or die("Bad Query: $sql");
		$row = mysqli_fetch_array($result);

		header("Location:done.html");
	}
	else {
		echo "ID not found";
	}
	?>
