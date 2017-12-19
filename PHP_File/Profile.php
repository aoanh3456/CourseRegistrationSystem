<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
	session_start();
	$userid = $_SESSION["userid"];
	$_SESSION["userid"] = $userid;
	
	include 'DBConnection.php';
	$query="SELECT `idStudent`, `FirstName`, `LastName`, `Email`, `Classification`, `Gender`, `Major`, `intake` 
		 FROM `student` where idStudent=$userid";
	$student = mysqli_query($conn, $query);
	$sturow=mysqli_fetch_array($student);
	
	$query="SELECT idmajor, concat(majorcode,' - ',majorname) as majorname FROM majortable";	
	$major = mysqli_query($conn, $query);

	$query="SELECT idClassification, ClassificationName FROM classificationtable";	
	$classification = mysqli_query($conn, $query);
 ?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Profile</title>
		<meta name="author" content="Rummy" />
		<!-- Date: 2017-12-14 -->
		<link rel="stylesheet" type="text/css" href="../CSS_File/menuStudentCSS.css">
		<script>
			function submitform() {
			 	document.forms["form"].action.value = "submit";
	   			document.forms["form"].submit();
			}
		</script>
	</head>
	<body>
		<?php
				include 'menuStudent.php';
		?>	
		<form name="form" method="post" action="ProfileMethod.php">
			<input type="hidden" name="action" value="1" >
			<div class="main">
				<table border="0">
				<tr>
					<td>First Name:</td>
					<td><input style="width: 200px" type="text" name="firstname" value="<?php if (isset($_SESSION["FirstName"])){echo (string)$_SESSION["FirstName"];}else{echo $sturow["FirstName"];}?>">  </td>
				</tr>
				<tr>
					<td>Last Name:</td>
					<td><input style="width: 200px" type="text" name="lastname" value="<?php if (isset($_SESSION["LastName"])){echo (string)$_SESSION["LastName"];}else{echo $sturow["LastName"];}?>"> </td>
				</tr>
				<tr>
					<td>Email:</td>
					<td><input style="width: 200px" type="email" name="email" value="<?php if (isset($_SESSION["Email"])){echo (string)$_SESSION["Email"];}else{echo $sturow["Email"];}?>"> </td>
				</tr>
				<tr>
					<td>Intake:</td>
					<td><input style="width: 200px" type="text" name="intake" value="<?php if (isset($_SESSION["intake"])){echo (string)$_SESSION["intake"];}else{echo $sturow["intake"];}?>"> </td>
				</tr>
				<tr>
					<td>Classification</td>
					<td>
						<select name="classification" style="width: 200px">
							<option value=""></option>
							<?php  
								if (isset($_SESSION["classification"])){
               						$class=(string)$_SESSION["classification"];
            					}else{
            						$class=$sturow["Classification"];
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
						<select name="gender" style="width: 200px">
							<?php  
								if (isset($_SESSION["gender"])){
               						$gender=(string)$_SESSION["gender"];
            					}else{
            						$gender=$sturow["Gender"];
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
						<select name="major" style="width: 200px">
							<option value=""></option>
							<?php  
								if (isset($_SESSION["major"])){
               						$temp=(string)$_SESSION["major"];
            					}else{
            						$temp=$sturow["Major"];
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
				<?php }
					if (isset($_SESSION["valid"])){
						unset($_SESSION["valid"]);
					}
				?>
				<tr>
					<td colspan="2" align="center">
						<a href="ChangePassword.php" colspan="2" align="center">Change your password</a>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<a href="javascript:submitform();" colspan="2" align="center"><img src="../Img/submit.png" alt="Edit" title="Edit" border=0 /></a>
					</td>
				</tr>
			</table>
			</div>
		</form>
	</body>
</html>