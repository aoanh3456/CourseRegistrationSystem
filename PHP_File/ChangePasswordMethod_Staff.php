<?php
	
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];
	$cfnewpassword=$_POST['cfnewpassword'];

	session_start();
	$userid = $_SESSION["userid"];
	$valid="1";
	if( empty($oldpassword) || empty($newpassword) || empty($cfnewpassword)){
		$valid="0";
	}
			
	include 'DBConnection.php';
	
	if($valid!="2"){
		$query="SELECT password FROM staff WHERE idStaff=$userid";
		if($passRS = mysqli_query($conn, $query)){
			while ($row=mysqli_fetch_array($passRS)){
				$passCurrent = $row["password"];
				if($passCurrent!=$oldpassword){
					$valid="2";
				}	
			}
		}
	}

	if($valid!="3"){
		if($newpassword!=$cfnewpassword){
			$valid="3";
		}
	}
	
	$check="0";
	
	if($check=="0" && $valid=="1"){
		$query="UPDATE `staff` SET password='$newpassword' where idStaff=$userid";
		if(mysqli_query($conn, $query)){
			$check="1";
			$newURL = "Manage.php";
			header('Location: '.$newURL);
		}
	}
	
	if($check=="0"){
		if($valid=="1"){
			$valid="0";
		}
		
		$_SESSION["valid"] = $valid;
		$_SESSION["userid"] = $userid;
		$newURL = "ChangePassword_Staff.php";
		header('Location: '.$newURL);
	}
?>