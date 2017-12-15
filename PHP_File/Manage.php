<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Manage</title>
		<meta name="author" content="Rummy" />
		<!-- Date: 2017-12-14 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">

	</head>
     <body>
		<table border="1" style="width:50%">
			<tr>
				<th>StudentID</th>
				<th>StudentName</th>
				<th>CourseName</th>
				<th>Date</th>
				<th>Status</th>
			</tr>
		</table>	

		<form name="form" method="post" action="">
		<input type="hidden" name="idStudent" value="" >
			<?php
				include 'menuStaff.php';
			?>
			<div id="main">
				<table>
				
				</table>
			</div>
		</form>
	</body>
</html>