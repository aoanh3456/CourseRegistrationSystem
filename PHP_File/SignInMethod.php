<?php
    include 'DBConnection.php';
	
	if($rs = mysqli_query($conn, "SELECT username, password FROM staff")){
		mysqli_free_result($rs);
	}
	
	
	
?>