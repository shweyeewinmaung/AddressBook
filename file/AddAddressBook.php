<?php
session_start();

include("../library/db.php");
include("../library/function.php");
include("../library/globalfunction.php");
include("../library/permission.php");
include("../dal/dal_addressbook.php");
include("../dal/dal_user.php");

if (isset($_POST['AddressBook_Name']))
{	
	$AddressBook_ID=AutoID('tbl_addressbook','AddressBook_ID','A-',6);
	$AddressBook_Name=Clean($_POST['AddressBook_Name']);
	$AddressBook_Phone=Clean($_POST['AddressBook_Phone']);
	$AddressBook_Email=Clean($_POST['AddressBook_Email']);
	$AddressBook_Address=Clean($_POST['AddressBook_Address']);
	
	$ret=GetAddressDataBy_AddressName($AddressBook_Name);
		
	$num=mysql_num_rows($ret);
	if($num>0)
	{
		$_SESSION['AddressBook_Name']="Exist";
	}else{
		InsertAddressBook($AddressBook_ID, $AddressBook_Name, $AddressBook_Phone, $AddressBook_Email, $AddressBook_Address);
		$_SESSION['AddressBook_Name']="Success";
	}
	
	
}


?>
<?php include("../template/header.php"); ?>

<ul class="list">
  <form method="post" >
    	<table style="margin:0 auto;">
        <tr><td colspan="2"><h1> Address Book Entry</h1></td></tr>
        <tr><td colspan="2">
           <font style="color:red; font-size:18px; line-height:50px;">
            <?php
                if(@$_SESSION['AddressBook_Name']=="Success"){ echo "Name is Added"; unset($_SESSION['AddressBook_Name']);}
             ?>
            <?php 
                if(@$_SESSION['AddressBook_Name']=="Exist"){ echo "Already Exist!"; unset($_SESSION['AddressBook_Name']);}
            ?></font>
        </td></tr>
       	<tr><td style="float:right;">Name : </td><td><input type="text" name="AddressBook_Name" required></td></tr>
        <tr><td style="float:right;">Phone : </td>
        	<td>
        		<input type="text" name="AddressBook_Phone" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" >
        	</td>
        </tr>
        <tr><td style="float:right;">Email : </td><td><input type="email" name="AddressBook_Email" required></td></tr>
        <tr><td style="float:right;">Address : </td><td><textarea name="AddressBook_Address" required  rows="5"  ></textarea></td></tr>
        <tr><td></td>
            <td>
                	<input type="submit" value="Add"/>
                    <input name="Reset" type="reset" value="Clear"><br><br>
                </td>
            </tr>
        </table>
	</form>
</ul>


</div>
<br style="clear:both">
