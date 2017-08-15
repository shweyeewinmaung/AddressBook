<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<h1>Login to Address Book</h1>

<form method="post" action="loginval.php">
    	<center><table>
        
        <tr>
                    <td colspan="2"><h1>Log In</h1></td>
                    
                </tr>
               
        	<?php
				if(isset($_SESSION['LogIn']) && $_SESSION['LogIn']="Fail")
				{
					?>
                    
	                    <th colspan="2" style="color:red; line-height:50px;"><b>Invalid LogIn! Please Try Again!!!</b></th>
                    <?php
				}
			?>
        	<tr>
            	<td style="float:right;">User Name : </td>
                <td><input type="text" name="txtname" required /></td>
            </tr>
            <tr>
            	<td style="float:right;">User Password : </td>
                <td><input type="password" name="txtpassword" required /></td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" value="LogIn"  />
                 <input name="Reset" type="reset" id="button" value="Cancel"  ><br><br></td>
            </tr>
        </table></center>
        </form>
</body>
</html>
