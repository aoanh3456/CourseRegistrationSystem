<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php
    include 'DBConnection.php';
	
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	if(isset($_SESSION["id"])){
		$id = $_SESSION['id'];
		$_SESSION['id']=$id;
	}
	
	if(isset($_GET["id"])){
		$id=$_GET["id"];
		$_SESSION['id']=$id;
		$query="SELECT c.idCourses, c.CoursesName, c.Credit, c.Teacher, 
			c.Availability, c.EnrolledNumber, c.Prerequisite, 
			c.CourseCode1, c.CourseCode2, c.MajorCourse, c.isOpening 
			FROM `courses` c where c.idCourses=$id";
		$courses = mysqli_query($conn, $query);
		while ($row=mysqli_fetch_array($courses)){
			$_SESSION['idCourses']=$row['idCourses'];
			$_SESSION['CoursesName']=$row['CoursesName'];
			$_SESSION['Credit']=$row['Credit'];
			$_SESSION['Teacher']=$row['Teacher'];
			$_SESSION['EnrolledNumber']=$row['EnrolledNumber'];
			$_SESSION['Prerequisite']=$row['Prerequisite'];
			$_SESSION['CourseCode1']=$row['CourseCode1'];
			$_SESSION['CourseCode2']=$row['CourseCode2'];
			$_SESSION['MajorCourse']=$row['MajorCourse'];
			$_SESSION['isOpening']=$row['isOpening'];
		}	
	}
	
	$query="SELECT idmajor, concat(majorcode,' - ',majorname) as majorname FROM majortable";	
	$major = mysqli_query($conn, $query);

?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignUp</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-13 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">

	</head>
	<body>
		<?php
				include 'menuStaff.php';
		?>
		<form name="form" method="post" action="ChangePassword_StuMethod.php">
			<div class="main">
				<table border="0">
				<tr>
					<td>Course Code 1:</td>
					<td><input style="width: 200px" type="text" name="CourseCode1" value="<?php if (isset($_SESSION["CourseCode1"])){echo (string)$_SESSION["CourseCode1"];}?>">  </td>
				</tr>
				<tr>
					<td>Course Code 2:</td>
					<td><input style="width: 200px" type="text" name="CourseCode2" value="<?php if (isset($_SESSION["CourseCode2"])){echo (string)$_SESSION["CourseCode2"];}?>"> </td>
				</tr>
				<tr>
					<td>Course Name:</td>
					<td><input style="width: 200px" type="text" name="CoursesName" value="<?php if (isset($_SESSION["CoursesName"])){echo (string)$_SESSION["CoursesName"];}?>"> </td>
				</tr>
				<tr>
					<td>Credit:</td>
					<td><input style="width: 200px" type="text" name="Credit" value="<?php if (isset($_SESSION["Credit"])){echo (string)$_SESSION["Credit"];}?>"> </td>
				</tr>
				<tr>
					<td>Teacher:</td>
					<td><input style="width: 200px" type="text" name="Teacher" value="<?php if (isset($_SESSION["Teacher"])){echo (string)$_SESSION["Teacher"];}?>"> </td>
				</tr>
				<tr>
					<td>Enroll Number:</td>
					<td><input style="width: 200px" type="text" name="EnrolledNumber" value="<?php if (isset($_SESSION["EnrolledNumber"])){echo (string)$_SESSION["EnrolledNumber"];}?>"> </td>
				</tr>
				<tr>
					<td>Prerequisite:</td>
					<td align="center">
							<?php 
							if(isset($_SESSION["Prerequisite"]) && $row["Prerequisite"]=="1"){
								if(isset($_SESSION['idCourses'])){
									$temp=$_SESSION["idCourses"];
								}
								$query="select red.CoursesName from prerequisitetable pre inner join courses red on pre.idCoursesPrerequisite=red.idCourses
											where pre.idCourses=$temp";
								$pre_courses = mysqli_query($conn, $query);
							 ?>
							 <table border="0">
							 	<?php while ($row_pre=mysqli_fetch_array($pre_courses)){ ?>
							 		<tr align="center"><td><?php echo $row_pre["CoursesName"] ?></td></tr>
							 	<?php } ?>
							 </table>
							 <?php } ?>
					</td>
				</tr>
				<tr>
					<td>Major Course:</td>
					<td>
						<select name="MajorCourse" style="width: 200px">
							<option value="">General</option>
							<?php  
								if (isset($_SESSION["MajorCourse"])){
               						$temp=(string)$_SESSION["MajorCourse"];
            					}
							while ($rowma=mysqli_fetch_array($major)){
								if($temp==$rowma["idmajor"]){?>
									<option value="<?php echo $rowma["idmajor"] ?>" selected="selected"><?php echo $rowma["majorname"] ?></option>
								<?php }else{  ?>
									<option value="<?php echo $rowma["idmajor"] ?>"><?php echo $rowma["majorname"] ?></option>
								<?php }  ?>
							<?php }  ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>isOpening:</td>
					<td>
						<select name="isOpening" style="width: 200px">
							<?php  
								if (isset($_SESSION["isOpening"])){
               						$isopening=(string)$_SESSION["isOpening"];
            					}
								if($isopening=="1"){
							?>
								<option value="1" selected="selected"> Opening</option>
								<option value="0"> Closing</option>
							<?php }else{ ?>
								<option value="1"> Opening</option>
								<option value="0" selected="selected"> Closing</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value ="Submit"></td>
				</tr>
			</table>
		</div>
	</body>
</html>