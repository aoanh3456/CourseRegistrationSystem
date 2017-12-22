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
  				width: 65%;
  				border: 0px solid black;
			}

			.right {
  				width:35%;
  				background-color: #1E90FF;
  				border: 0px solid black;
  			}
		}
	</style>
</head>	
<body>	
	<form name="form" method="post" action="PHP_File/SignInMethod.php">
		<div class="row">
  			<div class="column left">
    			<img src="Img/Courses2.png" style="width:877px;height:637px;">
  			</div>
  			<div class="column right" align="center">
         		<td>
             		<img src="Img/Courses5.png" style="width:300px;height:300px;">	
         		</td>
         		<div>
					<table border="0">
						<tr>
 								<td width="70%" colspan="2" valign="bottom" align="center">
                                     <input type="text" name="username" placeholder="Username" style="width:300px;height: 40px; border: 2px solid purple;
    border-radius: 4px;"  value="<?php if (isset($_SESSION["username"])){echo (string)$_SESSION["username"];}?>">
                                </td>
                    	</tr>         
                   		<tr>           
                      		<td height="100" colspan="2" width="70%" valign="top" align="center">
                    			<input type="password" style="width:300px;height: 40px; border: 2px solid purple;
    border-radius: 4px;" name="password" placeholder="Password"  >
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
                  			<td colspan="2" align="center" style="color: red;">Invalid account!</td>
                 		</tr>
                  		<?php  }
            				if (isset($_SESSION["valid"])){
                   				unset($_SESSION["valid"]);
                			}
               			?>
                		<tr>         	
               				<td align="center" valign="top" colspan="2" >
                         		<input type="submit" ttname="signinbotton" value ="Login"  style=" background-color: #6959CD;
    								border: none;
    								color: white;
    								padding: 15px 32px;
    								text-align: center;
    								text-decoration: none;
    								display: inline-block;
    								font-size: 16px;
    								-moz-border-radius: 10px;
									-webkit-border-radius: 10px;
									box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);">
                                     	</td> 
                     	</tr>
                   	</table>
         		</div>
			</div>
		</div>
	</form>
</body>
</html>