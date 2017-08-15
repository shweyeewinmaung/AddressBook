<?php
session_start();
include("../library/db.php");
include("../library/globalfunction.php");
require_once("../dal/dal_user.php");


$User_Name=Clean($_POST['txtname']);
$Password=Clean($_POST['txtpassword']);

$ret=GetLogInData($User_Name, $Password);
$num=mysql_num_rows($ret);

if($num>0)
{
	$row=mysql_fetch_array($ret);
	$_SESSION['SESS']['User']['User_ID']=$row['User_ID'];
	$_SESSION['SESS']['User']['User_Name']=$row['User_Name'];
	
	
	header("location:../index.php");
}
else
{
	$_SESSION['LogIn']="Fail";
	header("location:LogIn.php");
}
?>