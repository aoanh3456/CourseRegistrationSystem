<?php
	include 'datecurrent.php';
	session_start();
	$userid = $_SESSION["userid"];
    $id=$_GET["id"];
	if(isset($_GET["action"]))
		$action=$_GET["action"];
	else {
		$action="1";
	}
	$check="0";
	
		
	include 'DBConnection.php';
	
	if($action=="enroll"){
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
	}
	
	if($action=="delete"){
		$query="DELETE FROM registrationrequest where idCourses=$id and idStudent=$userid";
		if(mysqli_query($conn, $query)){
			$check="1";
			$_SESSION["userid"] = $userid;
			$newURL = "ViewRegisteredCourse.php";
			header('Location: '.$newURL);
		}
				
					
		if($check=="0"){
			$_SESSION["check"] = $check;
			$_SESSION["userid"] = $userid;
			$newURL = "ViewRegisteredCourse.php";
			header('Location: '.$newURL);
		}
	}		
?>