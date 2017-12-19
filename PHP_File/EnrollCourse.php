<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="select a.teacher, a.idCourses, case when a.CourseCode1='' then a.CourseCode2 else a.CourseCode1 end, a.CoursesName, a.credit, case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end, a.Prerequisite
	 from courses a left join majortable b on a.majorcourse=b.idmajor
	 where a.isOpening=1 and (a.majorcourse in (select major from student where idStudent=$userid) or a.majorcourse=0) 
	 		and a.idCourses not in (select idCourses from registeredcoures where idStudent=$userid)
	 		and a.idCourses not in (select idCourses from registrationrequest where idStudent=$userid)
	 		and a.Prerequisite=0
	union
	select a.teacher, a.idCourses, case when a.CourseCode1='' then a.CourseCode2 else a.CourseCode1 end, a.CoursesName, a.credit, case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end, a.Prerequisite
	 from courses a left join majortable b on a.majorcourse=b.idmajor
	 where a.isOpening=1 and (a.majorcourse in (select major from student where idStudent=$userid) or a.majorcourse=0) 
	 		and a.idCourses not in (select idCourses from registeredcoures where idStudent=$userid)
			and a.idCourses not in (select idCourses from registrationrequest where idStudent=$userid)
	 		and a.Prerequisite=1 and a.idCourses in (select pre.idCourses from prerequisitetable pre left join registeredcoures red on pre.idCoursesPrerequisite=red.idCourses where red.idStudent=$userid
												group by pre.idCourses having count(pre.idCoursesPrerequisite)=count(red.idCourses))												
											";
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
					<?php } ?>
				</table>
				<table border="0" style="width:100%">
					<tr>
						
					</tr>
				</table>
				<table border="1" style="width:100%">
					<tr>
						<th align="center" width="10%">Course Code</th>
						<th align="center" width="20%">Course Name</th>
						<th align="center" width="5%">Credit</th>
						<th align="center" width="10%">Major</th>
						<th align="center" width="10%">Teacher</th>
						<th align="center" width="35%">Prerequisite</th>
						<th align="center" width="10%">Action</th>
					</tr>
					<?php
						while ($row=mysqli_fetch_array($courses)){
					?>
					<tr>
						<td align="center"><?php echo $row["case when a.CourseCode1='' then a.CourseCode2 else a.CourseCode1 end"] ?></td>
						<td align="center"><?php echo $row["CoursesName"] ?></td>
						<td align="center"><?php echo $row["credit"] ?></td>
						<td align="center"><?php echo $row["case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end"] ?></td>
						<td align="center"><?php echo $row["teacher"] ?></td>
						<td align="center">
							<?php 
							if($row["Prerequisite"]==1){
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
						<td align="center">
							<a href="EnrollCourseMethod.php?id=<?php echo $row["idCourses"] ?>&action=enroll"><img src="../Img/check.png" alt="Enroll" title="Enroll" border=0 /></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>