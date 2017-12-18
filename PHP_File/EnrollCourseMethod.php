<?php
	include 'datecurrent.php';
	session_start();
	$userid = $_SESSION["userid"];
    $id=$_GET["id"];
	$check="0";
	
		
	include 'DBConnection.php';
	$query="INSERT INTO `registrationrequest`(`idStudent`, `idCourses`, `RequestDate`, `Status`) VALUES ($userid,$id,'$datenow',0)";
	if(mysqli_query($conn, $query)){
		$check="1";
		$_SESSION["userid"] = $userid;
		$newURL = "ViewRegisteredCourse.php";
		header('Location: '.$newURL);
	}
			
				
	if($check=="0"){
		$_SESSION["check"] = $check;
		$_SESSION["userid"] = $userid;
		$newURL = "EnrollCourse.php";
		header('Location: '.$newURL);
	}		
?>