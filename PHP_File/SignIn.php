<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignIn</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-14 -->
			<style>
			body {margin:0;}
			
			.topmenu {
			  overflow: hidden;
			  background-color: #000;
			  position: fixed;
			  top: 0;
			  width: 100%;
			}
			
			.topmenu a {
			  float: left;
			  display: block;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 17px;
			}
			
			.main {
			  padding: 16px;
			  margin-top: 30px;
			  height: 1500px;
			}
			</style>
	</head>

	<body>
	<div class="topmenu">
  			<a href="#profile">Profile</a>
  			<a href="#Registration Course">Registration Course</a>
  			<a href="#Registered Course">Registered Course</a>
		</div>
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