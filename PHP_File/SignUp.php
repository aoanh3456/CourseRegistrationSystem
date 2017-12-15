<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php
    include 'DBConnection.php';
	
		$query="SELECT idmajor, concat(majorcode,' - ',majorname) as majorname FROM majortable";
	
		$major = mysqli_query($conn, $query);
	
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignUp</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-13 -->
		

	</head>
	<body>
		
		<form name="form" method="post" action="SignUpMethod.php">
			<div class="main">
				<table border="0">
				<tr>
					<td>Student ID:</td>
					<td><input style="width: 200px" type="text" name="studentid" ></td>
				</tr>
				<tr>
					<td>First Name:</td>
					<td><input style="width: 200px" type="text" name="firstname">  </td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input style="width: 200px" type="text" name="lastname"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input style="width: 200px" type="email" name="email"> </td>
				</tr>
				<tr>
					<td>Intake:</td>
					<td><input style="width: 200px" type="text" name="intake"> </td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<select name="gender" style="width: 200px">
							<option value="1"> Male</option>
							<option value="0"> Female</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Telephone:</td>
					<td><input style="width: 200px" type="tel" name="usrtel"> </td>
				</tr>
				<tr>
					<td>Major</td>
					<td>
						<select name="major" style="width: 200px">
							<option value=""></option>
							<?php  while ($row=mysqli_fetch_array($major)){?>
								<option value="<?php $row["idmajor"] ?>"><?php echo $row["majorname"] ?></option>
							<?php }  ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input style="width: 200px" type="text" name="username"> </td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input style="width: 200px" type="password" name="password"></td>
				</tr>
				<td colspan="2" align="center"><input type="submit" value ="Submit"><br></td>
			</table>
		</div>
	</body>
</html>