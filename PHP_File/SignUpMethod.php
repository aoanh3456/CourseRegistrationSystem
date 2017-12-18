<?php
	
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$intake=$_POST['intake'];
	$gender=$_POST['gender'];
	$major=$_POST['major'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$cfpassword=$_POST['cfpassword'];
	$classification=$_POST['classification'];

	session_start();
	$valid="1";
	if(empty($firstname) || empty($lastname) || empty($email) || empty($intake) || empty($major)
			|| empty($username) || empty($password) || empty($classification) || empty($cfpassword)){
		$valid="0";
	}
			
	include 'DBConnection.php';
	
	if($valid!="2"){
		$query="SELECT COUNT(*) FROM `student` WHERE Username like '$username'";
		if($student = mysqli_query($conn, $query)){
			while ($row=mysqli_fetch_array($student)){
				$index = $row["COUNT(*)"];
				if($index>0){
					$valid="2";
				}	
			}
		}
	}
	
	if($valid!="2"){
		$query="SELECT COUNT(*) FROM `staff` WHERE Username like '$username'";
		if($staff = mysqli_query($conn, $query)){
			while ($row=mysqli_fetch_array($staff)){
				$index = $row["COUNT(*)"];
				if($index>0){
					$valid="2";
				}	
			}
		}
	}

	if($valid!="3"){
		if($password!=$cfpassword){
			$valid="3";
		}
	}
	
	$check="0";
	
	if($check=="0" && $valid=="1"){
		$query="INSERT INTO `student`(`FirstName`, `LastName`, `Email`, `Classification`, `Gender`, `Major`, `Username`, `Password`, `intake`) 
					VALUES ('$firstname','$lastname','$email',$classification,$gender,$major,'$username','$password',$intake);";
		if(mysqli_query($conn, $query)){
			$check="1";
			$newURL = "SignIn.php";
			header('Location: '.$newURL);
		}
	}
	
	if($check=="0"){
		if($valid=="1"){
			$valid="0";
		}
		
		$_SESSION["valid"] = $valid;
		$_SESSION["firstname"] = $firstname;
		$_SESSION["lastname"] = $lastname;
		$_SESSION["email"] = $email;
		$_SESSION["intake"] = $intake;
		$_SESSION["gender"] = $gender;
		$_SESSION["major"] = $major;
		$_SESSION["username"] = $username;
		$_SESSION["classification"] = $classification;
		$newURL = "SignUp.php";
		header('Location: '.$newURL);
	}
?>