<?php
    session_start();
	include 'DBConnection.php';
	$userid = $_SESSION["userid"];
    $studentid=$_GET["sid"];
	$courseid=$_GET["cid"];
	if(isset($_GET["action"]))
		$action=$_GET["action"];
	else {
		$action="1";
	}
	$check="0";
	if(isset($_GET["status"])){
		$value=$_GET["status"];
	
		if($action=="approve"){
			$value="1";
		}else if($action=="disapprove"){
			$value="2";
		}else if($action=="finish"){
			$value="3";
		}
	
	
		
		$query="update registrationrequest set status=$value where idCourses=$courseid and idStudent=$studentid";
		if(mysqli_query($conn, $query)){
			$check="1";
			$_SESSION["userid"] = $userid;
			$newURL = "Manage.php";
			header('Location: '.$newURL);
		}
		
		if($action=="finish"){
			$query="INSERT INTO registeredcoures (idStudent, idCourses) VALUES ($studentid,$courseid)";
			if(mysqli_query($conn, $query)){
				$check="1";
				$_SESSION["userid"] = $userid;
				$newURL = "Manage.php";
				header('Location: '.$newURL);
			}
		}
	}
							
	if($check=="0"){
		$_SESSION["check"] = $check;
		$_SESSION["userid"] = $userid;
		$newURL = "Manage.php";
		header('Location: '.$newURL);
	}
?>