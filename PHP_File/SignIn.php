<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignIn</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-14 -->
	</head>

	<body>
		<form name="form" method="post" action="SignInMethod.php">
			<div class="main">
				<table border="0">
					<tr>
						<td>Username:</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password"></td>
					</tr>
					<?php 
						session_start();
						$valid="1";
						if (isset($_SESSION["valid"])){
               				$valid=(string)$_SESSION["valid"];
            			}
						if($valid=="0"){
					?>
					<tr>
						<td colspan="2">Invalid account!</td>
					</tr>
					<?php  }
						session_destroy();
					?>
					<tr>
						<td><input type="submit" name="signinbotton" value ="Login"></td>
						<td><input type="button"  value ="Signup"></td>	
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>