<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="SELECT c.idCourses, case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end, a.idStudent, concat(b.FirstName, ' ', b.LastName) as NameStudent, c.CoursesName, a.RequestDate, a.Status, c.teacher, c.Prerequisite 
		FROM registrationrequest a inner join student b on a.idStudent=b.idStudent inner join courses c on a.idCourses=c.idCourses";
	$student = mysqli_query($conn, $query);
 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Manage</title>
		<meta name="author" content="Rummy" />
		<!-- Date: 2017-12-14 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">
		<link rel="stylesheet" type="text/css" href="../CSS_File/tableCSS.css">
	</head>
     <body>
     	<?php
				include 'menuStaff.php';
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
						<td>Cannot rely this request. Please try again!</td>
					</tr>
					<?php } 
						if (isset($_SESSION["check"])){
							unset($_SESSION["check"]);
						}
					?>
				</table>
				<table id="tablecss" border="1" style="width:100%">
					<tr>
						<th align="center" width="7%">Student ID</th>
						<th align="center" width="7%">Course ID</th>
						<th align="center" width="15%">Student Name</th>
						<th align="center" width="16%">Course Name</th>
						<th align="center" width="15%">Prerequisite</th>
						<th align="center" width="10%">Teacher</th>
						<th align="center" width="10%">Date Request</th>
						<th align="center" width="10%">Status</th>
						<th align="center" width="10%">Action</th>
					</tr>
					<?php  
						while ($row=mysqli_fetch_array($student)){
					?>
					<tr>
						<td align="center"><?php echo $row["idStudent"] ?></td>
						<td align="center"><?php echo $row["case when c.CourseCode1='' then c.CourseCode2 else c.CourseCode1 end"] ?></td>
						<td align="left"><?php echo $row["NameStudent"] ?></td>
						<td align="left"><?php echo $row["CoursesName"] ?></td>
						<td align="center">
							<?php 
							if($row["Prerequisite"]==1){
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
						<td align="left"><?php echo $row["teacher"] ?></td>
						<td align="center"><?php echo $row["RequestDate"] ?></td>
							<?php if($row["Status"]=="0"){ ?>
								<td align="center">Waiting</td>
							<?php }else if($row["Status"]=="1"){ ?>
								<td align="center">Approved</td>
							<?php }else if($row["Status"]=="2"){ ?>
								<td align="center">Disapproved</td>
							<?php }else if($row["Status"]=="3"){ ?>
								<td align="center">Finish</td>
							<?php }else{ ?>
								<td align="center"></td>
							<?php } ?>	
						<td align="center">
							<?php if($row["Status"]=="0"){ ?>
								<a href="ManageMethod.php?cid=<?php echo $row["idCourses"] ?>&sid=<?php echo $row["idStudent"] ?>&status=<?php echo $row["Status"] ?>&action=approve"><img src="../Img/check.png" alt="Approve" title="Approve" border=0 /></a>
								<a href="ManageMethod.php?cid=<?php echo $row["idCourses"] ?>&sid=<?php echo $row["idStudent"] ?>&status=<?php echo $row["Status"] ?>&action=disapprove"><img src="../Img/delete.png" alt="Disapprove" title="Disapprove" border=0 /></a>
							<?php }else if($row["Status"]=="1"){ ?>
								<a href="ManageMethod.php?cid=<?php echo $row["idCourses"] ?>&sid=<?php echo $row["idStudent"] ?>&status=<?php echo $row["Status"] ?>&action=disapprove"><img src="../Img/delete.png" alt="Disapprove" title="Disapprove" border=0 /></a>
								<a href="ManageMethod.php?cid=<?php echo $row["idCourses"] ?>&sid=<?php echo $row["idStudent"] ?>&status=<?php echo $row["Status"] ?>&action=finish"><img src="../Img/update.png" alt="Finish" title="Finish" border=0 /></a>
							<?php }else if($row["Status"]=="2"){ ?>
								<a href="ManageMethod.php?cid=<?php echo $row["idCourses"] ?>&sid=<?php echo $row["idStudent"] ?>&status=<?php echo $row["Status"] ?>&action=approve"><img src="../Img/check.png" alt="Approve" title="Approve" border=0 /></a>
							<?php }else{ ?>
								
							<?php } ?>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>