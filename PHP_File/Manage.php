<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	
	include 'DBConnection.php';
	$query="SELECT a.idStudent, concat(b.FirstName, ' ', b.LastName) as NameStudent, c.CoursesName, a.RequestDate, a.Status 
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

	</head>
     <body>
     	<?php
				include 'menuStaff.php';
		?>	

		<form name="form" method="post" action="">
		<input type="hidden" name="idStudent" value="" >
			<div class="main">
				<table border="0" style="width:100%">
					<tr>
						
					</tr>
				</table>
				<table border="1" style="width:100%">
					<tr>
						<th align="center" width="10%">StudentID</th>
						<th align="center" width="30%">StudentName</th>
						<th align="center" width="30%">CourseName</th>
						<th align="center" width="10%">Date</th>
						<th align="center" width="10%">Status</th>
						<th align="center" width="10%">Action</th>
					</tr>
					<?php  
						while ($row=mysqli_fetch_array($student)){
					?>
					<tr>
						<td align="center"><?php echo $row["idStudent"] ?></td>
						<td align="left"><?php echo $row["NameStudent"] ?></td>
						<td align="left"><?php echo $row["CoursesName"] ?></td>
						<td align="center"><?php echo $row["RequestDate"] ?></td>
						<td align="center"><?php echo $row["Status"] ?></td>
						<td align="center">
							<a href=""><img src="../Img/check.png" alt="Approve" title="Approve" border=0 /></a>
							<a href=""><img src="../Img/check.png" alt="Disapprove" title="Disapprove" border=0 /></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>