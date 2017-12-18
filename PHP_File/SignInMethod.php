<?php
	session_start();
	$valid="1";
	if (empty($_POST["username"])) {
		$valid="0";
	}

    include 'DBConnection.php';
	
	$check="0";
	$username=$_POST['username'];
	$password=$_POST['password'];
	
	if($check=="0" && $valid=="1"){
		$query="SELECT idstaff, username, password FROM staff where username like '$username' and password like '$password'";
	
		if($staff = mysqli_query($conn, $query)){
			while ($row=mysqli_fetch_array($staff)){
	    		$userStaff = $row["username"];
	    		$passStaff = $row["password"];
				
//				if($userStaff == $_POST['username'] && $passStaff == $_POST['password']){
					mysqli_close($conn);
					$check="1";
					$userid = $row["idstaff"];
					$_SESSION["userid"] = $userid;
					$newURL = "Manage.php?";
					header('Location: '.$newURL);
//				}
	    	}
		}
	}
	
	if($check=="0" && $valid=="1"){
		$query="SELECT idstudent, username, password FROM student where username like '$username' and password like '$password'";
		
		if($student = mysqli_query($conn, $query)){
			while ($row=mysqli_fetch_array($student)){
	    		$userStaff = $row["username"];
	    		$passStaff = $row["password"];
				
//				if($userStaff == $_POST['username'] && $passStaff == $_POST['password']){
					mysqli_close($conn);
					$check="1";
					$userid = $row["idstudent"];
					$_SESSION["userid"] = $userid;
					$newURL = "EnrollCourse.php";
					header('Location: '.$newURL);
//				}
	    	}
		}
	}
	
	if($check=="0"){
		$valid="0";
		$_SESSION["username"] = $username;
		$_SESSION["valid"] = $valid;
		$newURL = "../index.php";
		header('Location: '.$newURL);
	}
	

	mysqli_close($conn);
?>