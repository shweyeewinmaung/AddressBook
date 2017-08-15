<?php
if(!$_SESSION['SESS']['User'])
{
	header("Location:../file/LogIn.php");
}
?>