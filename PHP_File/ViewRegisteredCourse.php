<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="select req.idStudent, req.idCourses, req.RequestDate, req.Status, c.Teacher, c.credit, c.CoursesName, c.Prerequisite, 
		 case when isnull(b.idMajor)=1 then 'General' ELSE b.MajorName end,
		 case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end
		 from registrationrequest req inner join courses c on req.idCourses=c.idCourses
		 	left join majortable b on c.majorcourse=b.idmajor where req.idStudent=$userid and req.status!=3 order by req.Status";
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
						<td>Cannot delete course. Please try again!</td>
					</tr>
					<?php }else if($check=="2"){ ?>
					<tr>
						<td>The course is executed!</td>
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
				<table id="tablecss" border="1" style="width:100%">
					<tr>
						<td align="center" colspan="10">
							Course Request
						</td>
					</tr
					<tr>
						<th align="center" width="10%">Course Code</th>
						<th align="center" width="20%">Course Name</th>
						<th align="center" width="5%">Credit</th>
						<th align="center" width="10%">Major</th>
						<th align="center" width="10%">Teacher</th>
						<th align="center" width="25%">Prerequisite</th>
						<th align="center" width="10%">Status</th>
						<th align="center" width="10%">Action</th>
					</tr>
					<?php
						while ($row=mysqli_fetch_array($courses)){
					?>
					<tr>
						<td align="center"><?php echo $row["case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end"] ?></td>
						<td align="center"><?php echo $row["CoursesName"] ?></td>
						<td align="center"><?php echo $row["credit"] ?></td>
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
							 	<?php while ($rowe=mysqli_fetch_array($pre_courses)){ ?>
							 		<tr align="center"><td><?php echo $rowe["CoursesName"] ?></td></tr>
							 	<?php } ?>
							 </table>
							 <?php } ?>
						</td>
							<?php if($row["Status"]=="0"){ ?>
								<td align="center">Waiting</td>
							<?php }else if($row["Status"]=="1"){ ?>
								<td align="center">Approved</td>
							<?php }else if($row["Status"]=="2"){ ?>
								<td align="center">Disapproved</td>
							<?php }else if($row["Status"]=="3"){ ?>
								<td align="center">Finish</td>
							<?php } ?>
						<td align="center">
							<?php if($row["Status"]=="0"){ ?>
								<a href="EnrollCourseMethod.php?id=<?php echo $row["idCourses"] ?>&action=delete"><img src="../Img/delete.png" alt="Drop" title="Drop" border=0 /></a>
							<?php }?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>