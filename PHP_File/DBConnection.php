<?php
    $servername = "localhost";
	$usernamedb = "root";
	$passworddb = "";
	$database = "courseregistrationdatabase";

	$conn = mysqli_connect($servername, $usernamedb, $passworddb, $database);

	if (!$conn) {
  	  die("Connection failed: " . mysqli_connect_error());
	}
?>