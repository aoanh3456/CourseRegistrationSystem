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
		table{
  
    width: 100%;
	border: 0px solid;
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
    height: 638px;
}

.left {
  width: 60%;
   
}

.right {
  width:40%;
 
  background-color: #1E90FF;
  border: 0px solid black;
  }

}


</style>
	</head>	

	<body >
			
		<form name="form" method="post" action="PHP_File/SignInMethod.php">
			<div class="row">
  <div class="column left"  >
  
    	<img src="Img/Courses2.png" style="width:877px;height:637px;">
  
  </div>
 
  <div class="column right" align="center">
         <td>
             <img src="Img/Courses5.png" style="width:300px;height:300px;">	
         </td>
         <div >
                                 <table border="1"   >	
                                 <tr>
                                    <td height="50">
                                     <input type="text" name="username" placeholder="Username" style="width:300px"  value="<?php if (isset($_SESSION["username"])){echo (string)$_SESSION["username"];}?>">
                                     </td>
                                 </tr>
                                 
                                 <tr>
                                    
                                     <td height="10
                                     
                                     
                                     0" width="50">
                                     	<input type="password" name="password" placeholder="Password" >
                                     	</td>
                                 </tr>
                                 <?php 
                                                                                  $valid="1";
                                     if (isset($_SESSION["valid"])){
                                            $valid=(string)$_SESSION["valid"];
                                     }
                                     if($valid=="0"){
                                 ?>
                                 <tr>
                                     <td colspan="2" align="left">Invalid account!</td>
                                 </tr>
                                 <?php  }
                                     if (isset($_SESSION["valid"])){
                                         unset($_SESSION["valid"]);
                                     }
                                 ?>
                                 <tr>
                                 	
                                     <td align="left"  >
                                     	<input type="submit" name="signinbotton" value ="Login" style="background-color: #FFFFF; 
    									border: 1 solid px;
    									color: black;
   										padding: 10px;
    									width: 20%;
    									text-align: center;
    									text-decoration: none;
    									font-size: 16px;"  >
                                     	</td>
                                     
                                 </tr>
                                 <h2></h2>
                                 <tr>
                                 </tr>
                                 </table>
                                 </div>
                                 </div>
 
		</div>
		</form>
	</body>
</html>