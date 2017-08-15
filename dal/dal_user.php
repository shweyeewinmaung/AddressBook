<?php
function GetLogInData($User_Name, $Password)
{
	$sql="SELECT * FROM tbl_user WHERE User_Name='$User_Name' AND User_Password='$Password'";
	return mysql_query($sql);
}

?>