<?php

	
	if (empty($_POST['password']) || empty($_POST['password'])) {
		
	}

    include 'DBConnection.php';
	
	$check="0";
	$query="SELECT idstaff, username, password FROM staff";
	
	if($staff = mysqli_query($conn, $query)){
		while ($row=mysqli_fetch_array($staff)){
    		$userStaff = $row["username"];
    		$passStaff = $row["password"];
			
			if($userStaff == $_POST['username'] && $passStaff == $_POST['password']){
				mysqli_close($conn);
				$check="1";
				$newURL = "Manage.php";
				header('Location: '.$newURL);
			}
    	}
	}
	
	$query="SELECT idstudent, username, password FROM student";
	
	if($staff = mysqli_query($conn, $query)){
		while ($row=mysqli_fetch_array($staff)){
    		$userStaff = $row["username"];
    		$passStaff = $row["password"];
			
			if($userStaff == $_POST['username'] && $passStaff == $_POST['password']){
				mysqli_close($conn);
				$check="1";
				$newURL = "EnrollCourse.php";
				header('Location: '.$newURL);
			}
    	}
	}
	
	if($check=="0"){
		$newURL = "SignIn.php";
		header('Location: '.$newURL);
	}
	

	mysqli_close($conn);
?>