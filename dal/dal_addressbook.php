<?php
function GetAllAddressDataASC()
{
	$sql="SELECT * FROM tbl_addressbook ORDER BY AddressBook_ID";
	return mysql_query($sql);
}

function GetAddressDataByAddressID($AddressBook_ID)
{
	$sql="SELECT * FROM tbl_addressbook WHERE AddressBook_ID='$AddressBook_ID'";
	return mysql_query($sql);
}

function GetAddressDataBy_AddressName($AddressBook_Name)
{
	$sql="SELECT * FROM tbl_addressbook WHERE AddressBook_Name='$AddressBook_Name'";
	$ret=mysql_query($sql);
	return $ret;
}
function InsertAddressBook($AddressBook_ID, $AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address)
{
	$sql="INSERT INTO tbl_addressbook(AddressBook_ID, AddressBook_Name, AddressBook_Phone, AddressBook_Email, AddressBook_Address) 
			VALUES('$AddressBook_ID', '$AddressBook_Name', '$AddressBook_Phone', '$AddressBook_Email', '$AddressBook_Address')";
	mysql_query($sql);
}
function UpdateAddressBook($AddressBook_ID, $AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address)
{
	$sql="UPDATE tbl_addressbook SET AddressBook_Name='$AddressBook_Name', 
							  AddressBook_Phone='$AddressBook_Phone',
							  AddressBook_Email='$AddressBook_Email', 
							  AddressBook_Address='$AddressBook_Address'
							 
							WHERE AddressBook_ID='$AddressBook_ID'";
	mysql_query($sql);
}
function DeleteAddressBook($AddressBook_ID, $AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address)
{
	$sql="DELETE FROM tbl_addressbook WHERE AddressBook_ID='$AddressBook_ID'";
	mysql_query($sql);
}
?>