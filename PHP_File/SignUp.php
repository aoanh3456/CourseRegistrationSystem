<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignUp</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-13 -->
		

	</head>
	<body>
		

		<div class="main">
			Registration
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
				<td>Password</td>
				<td><input type="password" name="psw"></td>
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
				<td><input list="Gender">
					<datalist id="Gender">
						<option value="Male"> Male</option>
						<option value="Female"> Female</option>
					</datalist> </td> 
			</tr>
			<tr>
				<td>Telephone:</td>
				<td><input type="tel" name="usrtel"> </td>
			</tr>
			<tr>
				<td>Major</td>
				<td><input list="Major">
					<datalist id="Major">
						<option value="Computer Science">Computer Science</option>
						<option value="Bussiness Administrator">Bussiness Administrator</option>
					</datalist>
				</td>
			</tr>
			<td><input type="button" value ="SignUp"><br></td>
			</table>
		</div>
	</body>
</html>