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
		$query="Select isOpening from courses where idCourses=$id";
		if($status = mysqli_query($conn, $query)){
			while($row=mysqli_fetch_array($status)){
				if($rom["isOpening"]!="1"){
					$check="2";
				}
			}
		}
		
		$query="INSERT INTO `registrationrequest`(`idStudent`, `idCourses`, `RequestDate`, `Status`) VALUES ($userid,$id,'$datenow',0)";
		if(mysqli_query($conn, $query)){
			$check="1";
			$_SESSION["userid"] = $userid;
			$newURL = "EnrollCourse.php";
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
		$query="Select status from registrationrequest where idCourses=$id and idStudent=$userid";
		if($status = mysqli_query($conn, $query)){
			while($row=mysqli_fetch_array($status)){
				if($row["status"]!="0"){
					$check="2";
				}
			}
		}
		
		if($check!="2"){
			$query="DELETE FROM registrationrequest where idCourses=$id and idStudent=$userid";
			if(mysqli_query($conn, $query)){
				$check="1";
				$_SESSION["userid"] = $userid;
				$newURL = "ViewRegisteredCourse.php";
				header('Location: '.$newURL);
			}
		}
				
					
		if($check=="0" || $check=="2"){
			$_SESSION["check"] = $check;
			$_SESSION["userid"] = $userid;
			$newURL = "ViewRegisteredCourse.php";
			header('Location: '.$newURL);
		}
	}		
?>