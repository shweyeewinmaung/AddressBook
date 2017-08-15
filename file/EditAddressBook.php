<?php
session_start();

include("../library/db.php");
include("../library/function.php");
include("../library/globalfunction.php");
include("../library/permission.php");
include("../dal/dal_addressbook.php");
include("../dal/dal_user.php");

if(isset($_POST['btnUpdate']) && isset($_POST['AddressBook_ID']))
{
	$AddressBook_ID=Clean($_POST['AddressBook_ID']);
	$AddressBook_Name=Clean($_POST['AddressBook_Name']);
	$AddressBook_Phone=Clean($_POST['AddressBook_Phone']);
	$AddressBook_Email=Clean($_POST['AddressBook_Email']);
	$AddressBook_Address=Clean($_POST['AddressBook_Address']);
	
	UpdateAddressBook($AddressBook_ID, $AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address);
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
        <tr><td colspan="2"><h1> Address Book Update</h1></td></tr>
        <?php
			if($num>0)
			{
					$row=mysql_fetch_array($ret);
		?>
         <tr style="display:none;"><td style="float:right;">ID : </td><td><input type="text" name="AddressBook_ID" value="<?php echo $row['AddressBook_ID']; ?>"></td>
			</tr>
        <tr><td style="float:right;">Name : </td><td><input type="text" name="AddressBook_Name" value="<?php echo $row['AddressBook_Name']; ?>" required></td></tr>
        <tr><td style="float:right;">Phone : </td>
        	<td>
        		<input type="text" name="AddressBook_Phone" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="<?php echo $row['AddressBook_Phone']; ?>" >
        	</td>
        </tr>
        <tr><td style="float:right;">Email : </td><td><input type="email" name="AddressBook_Email" required value="<?php echo $row['AddressBook_Email']; ?>"></td></tr>
        <tr><td style="float:right;">Address : </td><td><textarea name="AddressBook_Address" required  rows="5"><?php echo $row['AddressBook_Address']; ?></textarea></td></tr>
        <tr><td></td>
            <td>
                	<input type="submit" value="Update" name="btnUpdate"/>
                     <a href="AllAddressBook.php">Back</a>
                </td>
            </tr>
           <?php } ?>
        </table>
	</form>
</ul>



<br style="clear:both">
