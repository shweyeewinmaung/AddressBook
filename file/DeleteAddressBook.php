<?php
session_start();

include("../library/db.php");
include("../library/function.php");
include("../library/globalfunction.php");
include("../library/permission.php");
include("../dal/dal_addressbook.php");
include("../dal/dal_user.php");

if(isset($_POST['btnDelete']) && isset($_POST['AddressBook_ID']))
{
	$AddressBook_ID=Clean($_POST['AddressBook_ID']);
	$AddressBook_Name=Clean($_POST['AddressBook_Name']);
	$AddressBook_Phone=Clean($_POST['AddressBook_Phone']);
	$AddressBook_Email=Clean($_POST['AddressBook_Email']);
	$AddressBook_Address=Clean($_POST['AddressBook_Address']);
	
	DeleteAddressBook($AddressBook_ID,$AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address);
	print "<script language=\"JavaScript\">window.location.href=\"AllAddressBook.php \";</script>";
}

if (isset($_GET['AddressBook_ID']) && $_GET['AddressBook_ID']!="")
{	
	$AddressBook_ID=Clean($_GET['AddressBook_ID']);
	$ret=GetAddressDataByAddressID($AddressBook_ID);
	$num=mysql_num_rows($ret);
}
?>
<?php include("../template/header.php"); ?>

<ul class="list">
  <form method="post" >
    <table style="margin:0 auto;">
        <tr><td colspan="2"><h1> Address Book Delete</h1></td></tr>
        <?php
			if($num>0)
			{
					$row=mysql_fetch_array($ret);
		?>
         <tr style="display:none;"><td style="float:right;">ID : </td><td><input type="text" name="AddressBook_ID" value="<?php echo $row['AddressBook_ID']; ?>"></td>
			</tr>
        <tr><td style="float:right;">Name : </td><td><?php echo $row['AddressBook_Name']; ?></td></tr>
        <tr><td style="float:right;">Phone : </td><td><?php echo $row['AddressBook_Phone']; ?></td></tr>
        <tr><td style="float:right;">Email : </td><td><?php echo $row['AddressBook_Email']; ?></td></tr>
        <tr><td style="float:right;">Address : </td><td><?php echo $row['AddressBook_Address']; ?></td></tr>
        <tr><td></td>
            <td>
                	<input type="submit" value="Delete" name="btnDelete"/>
                     <a href="AllAddressBook.php">Back</a>
                </td>
            </tr>
           <?php } ?>
        </table>
	</form>
</ul>



<br style="clear:both">
