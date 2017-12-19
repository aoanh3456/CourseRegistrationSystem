<?php
	
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$cfnewpassword=$_POST['cfnewpassword'];

	session_start();
	$userid = $_SESSION["userid"];
	$id = $_SESSION["id"];
	$valid="1";
	if(empty($newpassword) || empty($cfnewpassword)){
		$valid="0";
	}
			
	include 'DBConnection.php';

	if($valid!="3"){
		if($newpassword!=$cfnewpassword){
			$valid="3";
		}
	}
	
	$check="0";
	
	if($check=="0" && $valid=="1"){
		$query="UPDATE `student` SET password='$newpassword' where idStudent=$id";
		if(mysqli_query($conn, $query)){
			$check="1";
			$newURL = "ViewStudent.php";
			header('Location: '.$newURL);
		}
	}
	
	if($check=="0"){
		if($valid=="1"){
			$valid="0";
		}
		
		$_SESSION["id"] = $id;
		$_SESSION["valid"] = $valid;
		$_SESSION["userid"] = $userid;
		$newURL = "ChangePassword_Stu.php";
		header('Location: '.$newURL);
	}
?>