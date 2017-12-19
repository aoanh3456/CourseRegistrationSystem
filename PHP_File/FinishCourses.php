<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="SELECT reg.idStudent, c.idCourses, c.CoursesName, case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end, 
		 c.credit, case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end, c.teacher, c.Prerequisite 
		 FROM registeredcoures reg inner join courses c on reg.idCourses=c.idCourses left join majortable b on c.majorcourse=b.idmajor
		 where reg.idStudent=$userid";
	$courses = mysqli_query($conn, $query);
 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>EnrollCourse</title>
		<meta name="author" content="Rummy" />
		<!-- Date: 2017-12-14 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">
	</head>
	<body>
		<?php
			include 'menuStudent.php';
		?>
		<form name="form" method="post" action="">
			<div class="main">
				<table border="0" style="width:100%">
					<?php 
						$check="1";
						if (isset($_SESSION["check"])){
	               			$check=(string)$_SESSION["check"];
	            		}
						if($check=="0"){ ?>
					<tr>
						<td>Cannot register course. Please try again!</td>
					</tr>
					<?php }else if($check=="2"){ ?>
					<tr>
						<td>This course is closed immedietely!</td>
					</tr>	
					<?php } 
						if (isset($_SESSION["check"])){
							unset($_SESSION["check"]);
						}
					?>
				</table>
				<table border="0" style="width:100%">
					<tr>
						
					</tr>
				</table>
				<table border="1" style="width:100%">
					<tr>
						<th align="center" width="10%">Course Code</th>
						<th align="center" width="25%">Course Name</th>
						<th align="center" width="5%">Credit</th>
						<th align="center" width="15%">Major</th>
						<th align="center" width="10%">Teacher</th>
						<th align="center" width="35%">Prerequisite</th>
					</tr>
					<?php
						while ($row=mysqli_fetch_array($courses)){
					?>
					<tr>
						<td align="center"><?php echo $row["case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end"] ?></td>
						<td align="center"><?php echo $row["CoursesName"] ?></td>
						<td align="center"><?php echo $row["credit"] ?></td>
						<td align="center"><?php echo $row["case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end"] ?></td>
						<td align="center"><?php echo $row["teacher"] ?></td>
						<td align="center">
							<?php 
							if($row["Prerequisite"]=="1"){
								$temp=$row["idCourses"];
								$query="select red.CoursesName from prerequisitetable pre inner join courses red on pre.idCoursesPrerequisite=red.idCourses
											where pre.idCourses=$temp";
								$pre_courses = mysqli_query($conn, $query);
							 ?>
							 <table border="0">
							 	<?php while ($row=mysqli_fetch_array($pre_courses)){ ?>
							 		<tr align="center"><td><?php echo $row["CoursesName"] ?></td></tr>
							 	<?php } ?>
							 </table>
							 <?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>