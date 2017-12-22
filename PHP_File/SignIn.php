<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<?php 
session_start(); 
?>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SignIn</title>
		<meta name="author" content="NhienTran" />
		<!-- Date: 2017-12-14 -->
		<style>
		table {
    border: 300px ;
    padding: 100px;
   
}
* {
    box-sizing: border-box;
}

body {
    margin: 0;
}


.column {
    float: left;
    padding: 0px;
    height: 300px;
}

.left {
  width: 60%;
}

.right {
  width: 40%;
}


</style>
	</head>	

	<body >
			
		<form name="form" method="post" action="SignInMethod.php">
			<div class="row">
  <div class="column left"  >
  
    <img src="../Img/Courses2.jpg" style="width:900px;height:600px;">
  
  </div>
  <div class="column right">
  	<table border="0" >
  		<div class="row">
    
    	<p><td colspan="2">
    		<img src="../Img/Courses3.jpg" style="width:248	px;height:157px;" >
    	</td></p>
    </div>
                            <div class="row"> <tr>
                            		<td>Username:</td>
									<td><input type="text" name="username"  value="<?php if (isset($_SESSION["username"])){echo (string)$_SESSION["username"];}?>"></td>
								</tr>
								<tr>
									<td>Password:</td>
									<td><input type="password" name="password"></td>
								</tr>
								<?php 
									
									$valid="1";
									if (isset($_SESSION["valid"])){
										   $valid=(string)$_SESSION["valid"];
									}
									if($valid=="0"){
								?>
								<tr>
									<td colspan="2" align="center">Invalid account!</td>
								</tr>
								<?php  }
									if (isset($_SESSION["valid"])){
										unset($_SESSION["valid"]);
									}
								?>
								<div>
								<tr>
									<td align="center" colspan="2"><input type="submit" name="signinbotton" value ="Login"></td>
								</tr>
					</div>
								</table>
								
  </div>
</div>
			
			
				
		
		</form>
	</body>
</html>