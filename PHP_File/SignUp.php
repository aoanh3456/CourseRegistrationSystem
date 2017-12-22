<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php
    include 'DBConnection.php';
	
	session_start();
	
	$query="SELECT idmajor, concat(majorcode,' - ',majorname) as majorname FROM majortable";	
	$major = mysqli_query($conn, $query);

	$query="SELECT idClassification, ClassificationName FROM classificationtable";	
	$classification = mysqli_query($conn, $query);
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignUp</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-13 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">
		<link rel="stylesheet" type="text/css" href="../CSS_File/tableCSSv1.css">
	</head>
	<body>
		<?php
				include 'menuStaff.php';
		?>
		<form name="form" method="post" action="SignUpMethod.php">
			<div class="main">
				<table id="tablecssv1" border="0">
				<tr>
					<td align="center" colspan="2">
						Student Creation
					</td>
				</tr>	
				<tr>
					<td>First Name:</td>
					<td><input style="width: 400px" type="text" name="firstname" value="<?php if (isset($_SESSION["firstname"])){echo (string)$_SESSION["firstname"];}?>">  </td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input style="width: 400px" type="text" name="lastname" value="<?php if (isset($_SESSION["lastname"])){echo (string)$_SESSION["lastname"];}?>"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input style="width: 400px" type="email" name="email" value="<?php if (isset($_SESSION["email"])){echo (string)$_SESSION["email"];}?>"> </td>
				</tr>
				<tr>
					<td>Intake:</td>
					<td><input style="width: 400px" type="text" name="intake" value="<?php if (isset($_SESSION["intake"])){echo (string)$_SESSION["intake"];}?>"> </td>
				</tr>
				<tr>
					<td>Classification</td>
					<td>
						<select name="classification" style="width: 400px">
							<option value=""></option>
							<?php  
								if (isset($_SESSION["classification"])){
               						$class=(string)$_SESSION["classification"];
            					}
							while ($row=mysqli_fetch_array($classification)){
								if($class==$row["idClassification"]){?>
									<option value="<?php echo $row["idClassification"] ?>" selected="selected"><?php echo $row["ClassificationName"] ?></option>
								<?php }else{  ?>
									<option value="<?php echo $row["idClassification"] ?>"><?php echo $row["ClassificationName"] ?></option>
								<?php }  ?>
							<?php }  ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Gender:</td>
					<td>
						<select name="gender" style="width: 400px">
							<?php  
								if (isset($_SESSION["gender"])){
               						$gender=(string)$_SESSION["gender"];
            					}
								if($gender=="1"){
							?>
								<option value="1" selected="selected"> Male</option>
								<option value="0"> Female</option>
							<?php }else{ ?>
								<option value="1"> Male</option>
								<option value="0" selected="selected"> Female</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Major</td>
					<td>
						<select name="major" style="width: 400px">
							<option value=""></option>
							<?php  
								if (isset($_SESSION["major"])){
               						$temp=(string)$_SESSION["major"];
            					}
							while ($row=mysqli_fetch_array($major)){
								if($temp==$row["idmajor"]){?>
									<option value="<?php echo $row["idmajor"] ?>" selected="selected"><?php echo $row["majorname"] ?></option>
								<?php }else{  ?>
									<option value="<?php echo $row["idmajor"] ?>"><?php echo $row["majorname"] ?></option>
								<?php }  ?>
							<?php }  ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Username:</td>
					<td><input style="width: 400px" type="text" name="username" value="<?php if (isset($_SESSION["username"])){echo (string)$_SESSION["username"];}?>"> </td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input style="width: 400px" type="password" name="password"></td>
				</tr>
				<tr>
					<td>Comfirm Password:</td>
					<td><input style="width: 400px" type="password" name="cfpassword"></td>
				</tr>
				<?php 
					
					$valid="1";
					if (isset($_SESSION["valid"])){
               			$valid=(string)$_SESSION["valid"];
            		}
					if($valid=="0"){
				?>
				<tr>
					<td colspan="2" style="color: red;" align="center">Please input all information!</td>
				</tr>
				<?php  }else if($valid=="2"){?>
				<tr>
					<td colspan="2" style="color: red;" align="center">Username is used!</td>
				</tr>	
				<?php }else if($valid=="3"){ 	?>
				<tr>
					<td colspan="2" style="color: red;" align="center">Confirm Password is wrong!</td>
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