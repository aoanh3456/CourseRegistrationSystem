<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	unset($_SESSION['idCourses']);
	unset($_SESSION['CoursesName']);
	unset($_SESSION['Credit']);
	unset($_SESSION['Teacher']);
	unset($_SESSION['EnrolledNumber']);
	unset($_SESSION['Prerequisite']);
	unset($_SESSION['PrerequisiteName']);
	unset($_SESSION['CourseCode1']);
	unset($_SESSION['CourseCode2']);
	unset($_SESSION['MajorCourse']);
	unset($_SESSION['isOpening']);
	unset($_SESSION["id"]);
	
	include 'DBConnection.php';
	$query="SELECT c.idCourses, c.CoursesName, c.Credit, c.Teacher, c.Availability, 
		 c.EnrolledNumber, 
		 c.Prerequisite, c.CourseCode1, c.CourseCode2, case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end, c.isOpening 
		 FROM courses c left join majortable b on c.majorcourse=b.idmajor order by c.isOpening, c.EnrolledNumber  desc";
	$courses = mysqli_query($conn, $query);
 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EnrollCourse</title>
		<meta name="author" content="Rummy" />
		<!-- Date: 2017-12-14 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">
		<link rel="stylesheet" type="text/css" href="../CSS_File/tableCSS.css">
		<link rel="stylesheet" type="text/css" href="../CSS_File/button.css">
		
		<style>
			.button {
    			background-color: #6959CD; 
    			border: none;
    			color: white;
    			padding: 15px 32px;
    			text-align: center;
    			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    			text-decoration: none;
   				display: inline-block;
    			font-size: 16px;
			}
		</style>
	</head>
	<body>
		<?php
			include 'menuStaff.php';
		?>
		<form name="form" method="post" action="">
			<div class="main">
				<table border="0" style="width:100%">
					
				</table>
				<table border="0" style="width:100%">
					<tr>
						<td>
							<a class="button" href="CourseEdit.php?">Create new course</a>
						</td>
					</tr>
				</table>
				<table id="tablecss" border="1" style="width:100%">
					<tr>
						<td align="center" colspan="10">
							Courses Manage
						</td>
					</tr>
					<tr>
						<th align="center" width="5%">Course Code1</th>
						<th align="center" width="5%">Course Code2</th>
						<th align="center" width="20%">Course Name</th>
						<th align="center" width="5%">Credit</th>
						<th align="center" width="15%">Major</th>
						<th align="center" width="10%">Teacher</th>
						<th align="center" width="20%">Prerequisite</th>
						<th align="center" width="5%">EnrollNumber</th>
						<th align="center" width="5%">isOpening</th>
						<th align="center" width="10%">Edit</th>
					</tr>
					<?php
						while ($row=mysqli_fetch_array($courses)){
					?>
					<tr>
						<td align="center"><?php echo $row["CourseCode1"] ?></td>
						<td align="center"><?php echo $row["CourseCode2"] ?></td>
						<td align="center"><?php echo $row["CoursesName"] ?></td>
						<td align="center"><?php echo $row["Credit"] ?></td>
						<td align="center"><?php echo $row["case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end"] ?></td>
						<td align="center"><?php echo $row["Teacher"] ?></td>
						<td align="center">
							<?php 
							if($row["Prerequisite"]=="1"){
								$temp=$row["idCourses"];
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
						<td align="center"><?php echo $row["EnrolledNumber"] ?></td>
							<?php if($row["isOpening"]=="0"){ ?>
								<td align="center">Closing</td>
							<?php }else if($row["isOpening"]=="1"){ ?>
								<td align="center">Opening</td>
							<?php }else{ ?>
								<td align="center"></td>
							<?php } ?>
						<td align="center">
							<a href="CourseEdit.php?id=<?php echo $row["idCourses"] ?>"><img src="../Img/update.png" alt="Edit" title="Edit" border=0 /></a>
							<a href="CourseNumber.php?id=<?php echo $row["idCourses"] ?>"><img src="../Img/upload.png" alt="Number" title="Number" border=0 /></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>