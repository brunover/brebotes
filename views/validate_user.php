<?php
	// $servername = "localhost";
	// $dbname = "brebotes";
	// $username = "root";
	// $password = "root";

	$servername = "localhost";
	$username = "brebotes_user";
	$password = "#brebotes2017";
	$dbname = "brebotes_database";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Connection OK
	if ($conn) {
	    $username = $_GET['username'];
	    $password = $_GET['password'];
		
		$sql = "SELECT LOGIN, SENHA FROM usuario WHERE LOGIN = '".$username."' AND SENHA = '".$password."'";
		$result = mysqli_query($conn, $sql) or die("Error in Selecting " . mysqli_error($conn));
		$row = mysqli_fetch_assoc($result);

		// If it was found
		if ($row != NULL) {
		    echo "ok";
		} else {
		    echo "error";
		}

	// Connection FAILED
	} else {
		die("Connection failed: " . mysqli_connect_error());
	}

	mysqli_close($conn);
?>