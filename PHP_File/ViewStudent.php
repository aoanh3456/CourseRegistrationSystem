<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="SELECT stu.idStudent, concat(stu.FirstName, ' ', stu.LastName), stu.Email, case when stu.Gender=1 then 'Male' else 'Female' end, ma.MajorName, stu.Username, stu.intake 
		 FROM student stu inner join majortable ma on stu.Major=ma.idMajor";
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
						<th align="center" width="10%">Student ID</th>
						<th align="center" width="15%">Student Name</th>
						<th align="center" width="15%">Email</th>
						<th align="center" width="15%">Major</th>
						<th align="center" width="10%">Gender</th>
						<th align="center" width="15%">Username</th>
						<th align="center" width="10%">Intake</th>
						<th align="center" width="10%">Change information</th>
					</tr>
					<?php
						while ($row=mysqli_fetch_array($courses)){
					?>
					<tr>
						<td align="center"><?php echo $row["idStudent"] ?></td>
						<td align="center"><?php echo $row["concat(stu.FirstName, ' ', stu.LastName)"] ?></td>
						<td align="center"><?php echo $row["Email"] ?></td>
						<td align="center"><?php echo $row["MajorName"] ?></td>
						<td align="center"><?php echo $row["case when stu.Gender=1 then 'Male' else 'Female' end"] ?></td>
						<td align="center"><?php echo $row["Username"] ?></td>
						<td align="center"><?php echo $row["intake"] ?></td>
						<td align="center">
							<a href="ChangePassword_Stu.php?id=<?php echo $row["idStudent"] ?>"><img src="../Img/update.png" alt="ChangePass" title="ChangePass" border=0 /></a>
						</td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</form>
	</body>
</html>