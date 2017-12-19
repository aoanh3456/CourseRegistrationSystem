<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php	
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignUp</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-13 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">

	</head>
	<body>
		<?php
				include 'menuStaff.php';
		?>
		<form name="form" method="post" action="ChangePasswordMethod_Staff.php">
			<div class="main">
				<table border="0">
				<tr>
					<td>Old password:</td>
					<td><input style="width: 200px" type="password" name="oldpassword"> </td>
				</tr>
				<tr>
					<td>New password:</td>
					<td><input style="width: 200px" type="password" name="newpassword"></td>
				</tr>
				<tr>
					<td>Comfirm new password:</td>
					<td><input style="width: 200px" type="password" name="cfnewpassword"></td>
				</tr>
				<?php 
					
					$valid="1";
					if (isset($_SESSION["valid"])){
               			$valid=(string)$_SESSION["valid"];
            		}
					if($valid=="0"){
				?>
				<tr>
					<td colspan="2" align="center">Please input all information!</td>
				</tr>
				<?php  }else if($valid=="2"){?>
				<tr>
					<td colspan="2" align="center">Old password is wrong!</td>
				</tr>	
				<?php }else if($valid=="3"){ 	?>
				<tr>
					<td colspan="2" align="center">Confirm Password is wrong!</td>
				</tr>	
				<?php } 
					if (isset($_SESSION["valid"])){
						unset($_SESSION["valid"]);
					}
				?>
				<tr>
					<td colspan="2" align="center"><input type="submit" value ="Submit"></td>
				</tr>
			</table>
		</div>
	</body>
</html>