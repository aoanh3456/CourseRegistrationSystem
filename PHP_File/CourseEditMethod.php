<?php
	
	session_start();
	
	if(isset($_SESSION["id"])){
		$id = $_SESSION['id'];
	}	

	$userid = $_SESSION["userid"];
	$CoursesName=$_POST['CoursesName'];
	$Credit=$_POST['Credit'];
	$Teacher=$_POST['Teacher'];
	$EnrolledNumber=$_POST['EnrolledNumber'];
	$Prerequisite=$_POST['Prerequisite'];
	$CourseCode1=$_POST['CourseCode1'];
	$CourseCode2=$_POST['CourseCode2'];
	$MajorCourse=$_POST['MajorCourse'];
	$isOpening=$_POST['isOpening'];
	
	$valid="1";
	if(empty($CoursesName) || empty($CourseCode1) || empty($CourseCode2) || empty($Credit)){
		$valid="0";
	}
			
	include 'DBConnection.php';
	
	$check="0";
	
	if(!empty($Prerequisite)){
		$pre="1";
	}else{
		$pre="0";
	}
	
	if(empty($EnrolledNumber)){
		$EnrolledNumber="0";
	}
	
	if(empty($Teacher)){
		$Teacher="";
	}
	
	if($check=="0" && $valid=="1"){
		$query="";
		if(isset($_SESSION["id"])){
			$query="select COUNT(*) from registrationrequest where idCourses=$id and status=1";
			if($enroll = mysqli_query($conn, $query)){
				while ($row=mysqli_fetch_array($enroll)){
					$EnrolledNumber = $row["COUNT(*)"];
				}
			}
			
			$query="UPDATE `courses` SET `CoursesName`='$CoursesName',`Credit`=$Credit,`Teacher`='$Teacher',`Availability`=0,`EnrolledNumber`=$EnrolledNumber,
				`Prerequisite`=$pre,`CourseCode1`='$CourseCode1',`CourseCode2`='$CourseCode2',`MajorCourse`=$MajorCourse,`isOpening`=$isOpening
				 where idCourses=$id;";
			if(mysqli_query($conn, $query)){
				$query=	"DELETE FROM `prerequisitetable` where idCourses=$id;";
				if(mysqli_query($conn, $query)){
					if($pre=="1"){	 
						$query="INSERT INTO `prerequisitetable`(`idCourses`, `idCoursesPrerequisite`) VALUES ($id,$Prerequisite)";
						if(mysqli_query($conn, $query)){
							$check="1";
							$_SESSION["userid"] = $userid;
							$newURL = "CourseManage.php";
							header('Location: '.$newURL);
						}
					}else{
						$check="1";
						$_SESSION["userid"] = $userid;
						$newURL = "CourseManage.php";
						header('Location: '.$newURL);
					}
				}
			}			
		}else{
			$query="INSERT INTO `courses`(`CoursesName`, `Credit`, `Teacher`, `Availability`, `EnrolledNumber`, `Prerequisite`, `CourseCode1`, `CourseCode2`, `MajorCourse`, `isOpening`) 
				VALUES ('$CoursesName',$Credit,'$Teacher',0,$EnrolledNumber,$pre,'$CourseCode1','$CourseCode2',$MajorCourse,$isOpening);";
			if(mysqli_query($conn, $query)){
				$last_id = mysqli_insert_id($conn);
				if($pre=="1"){
					$query=" INSERT INTO `prerequisitetable`(`idCourses`, `idCoursesPrerequisite`) VALUES ($last_id,$Prerequisite)";
					if(mysqli_query($conn, $query)){
						$check="1";
						$_SESSION["userid"] = $userid;
						$newURL = "CourseManage.php";
						header('Location: '.$newURL);
					}
				}else{
					$check="1";
					$_SESSION["userid"] = $userid;
					$newURL = "CourseManage.php";
					header('Location: '.$newURL);
				}
			}
		}
	}
	
	if($check=="0"){
		if($valid=="1"){
			$valid="0";
		}
		
		$_SESSION["query"] = $query;
		$_SESSION["valid"] = $valid;
		$_SESSION['CoursesName']=$CoursesName;
		$_SESSION['Credit']=$Credit;
		$_SESSION['Teacher']=$Teacher;
		$_SESSION['EnrolledNumber']=$EnrolledNumber;
		$_SESSION['Prerequisite']=$Prerequisite;
		$_SESSION['CourseCode1']=$CourseCode1;
		$_SESSION['CourseCode2']=$CourseCode2;
		$_SESSION['MajorCourse']=$MajorCourse;
		$_SESSION['isOpening']=$isOpening;
		$_SESSION["userid"] = $userid;
		if(isset($_SESSION["id"])){
			$_SESSION['id']=$id;
		}
		$newURL = "CourseEdit.php";
		header('Location: '.$newURL);
	}
?>