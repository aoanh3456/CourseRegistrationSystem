<?php
	include 'DBConnection.php';
	session_start();
	
	$id=$_GET["id"];
	$userid = $_SESSION["userid"];
	
	$query="UPDATE `courses` SET `EnrolledNumber`=(select COUNT(*) from registrationrequest where idCourses=$id and status=1)
				 where idCourses=$id;";
	if(mysqli_query($conn, $query)){
	
	}
		
	$_SESSION["userid"] = $userid;
	$newURL = "CourseManage.php";
	header('Location: '.$newURL);
?>