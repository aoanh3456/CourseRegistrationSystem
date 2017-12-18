<?php
    $firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$intake=$_POST['intake'];
	$gender=$_POST['gender'];
	$major=$_POST['major'];
	$classification=$_POST['classification'];

	session_start();
	$userid = $_SESSION["userid"];
	
	$valid="1";
	if(empty($firstname) || empty($lastname) || empty($email) || empty($intake) || empty($major) || empty($classification)){
		$valid="0";
	}
			
	include 'DBConnection.php';
	
	$check="0";
	
	if($check=="0" && $valid=="1"){
		$query="UPDATE `student` SET `FirstName`='$firstname',`LastName`='$lastname',`Email`='$email',
			`Classification`=$classification,`Gender`=$gender,
			`Major`=$major,`intake`=$intake where idStudent=$userid";
		if(mysqli_query($conn, $query)){
			$check="1";
			$newURL = "EnrollCourse.php";
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
		$_SESSION["classification"] = $classification;
		$_SESSION["userid"] = $userid;
		$newURL = "Profile.php";
		header('Location: '.$newURL);
	}
?>