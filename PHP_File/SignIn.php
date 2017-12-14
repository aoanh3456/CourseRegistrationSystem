<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignIn</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-14 -->
			<style>
				<?php
					include 'menutopCSS.php';
				?>
			</style>
	</head>

	<body>
		<?php
			include 'menutop.php';
		?>
		<div class="main">
			<table border="0">
					<tr>
						<td>Student ID:</td>
						<td><input type="text" name="Stuid" ></td>
					</tr>
					<tr>
						<td>FirstName:</td>
						<td><input type="text" name="firstname">  </td>
					</tr>
					<tr>
						<td>LastName:</td>
						<td><input type="text" name="lastname"> </td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="email" name="email"> </td>
					</tr>
					<tr>
						<td>Intake:</td>
						<td><input type="text" name="intake"> </td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><input type="text" name="gender"></td>
					</tr>
					<tr>
						<td>Telephone:</td>
						<td><input type="tel" name="usrtel"> </td>
					</tr>
					<tr>
						<td>Major</td>
						<td><input type="text" name="major"></td>
					</tr>
			</table>
			</div>
	</body>
</html>