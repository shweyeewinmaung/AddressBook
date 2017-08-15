<?php
	session_start();
	
	include("../library/db.php");
	include("../library/function.php");
	include("../library/globalfunction.php");
	include("../library/permission.php");
	include("../dal/dal_addressbook.php");
	include("../dal/dal_user.php");
	include("../pager/pager_addressbook.php");
	
	
	$pageSize=2;
	if(isset($_GET['page']))
	{
		$currentPageIndex=Clean($_GET['page']);
	}
	else
	{
		$currentPageIndex=1;
	}
	$objPager=new pager($pageSize,$currentPageIndex);
	
	$sql=$objPager->SearchData_GetAllAddressBook();
	$rett=$objPager->Search_Data($sql);
	$num=mysql_num_rows($rett);

?>
<?php include("../template/header.php"); ?>

<ul class="list">
	<h1> Address Book List</h1><br>
		<table>
  		 <?php
				if($num>0)
				{
					for($i=0;$i<$num;$i++)
					{
							$rowt=mysql_fetch_array($rett);
							$ret=GetAddressDataByAddressID($rowt['AddressBook_ID']);
							$row=mysql_fetch_array($ret);
					
		?>
       
    <li>
      Name :<font><?php echo $row['AddressBook_Name'] ?></font><br>
      Phone : <i><?php echo $row['AddressBook_Phone'] ?></i><br>
      Email : <small> <?php echo $row['AddressBook_Email'] ?></small><br>
      Address : <?php echo $row['AddressBook_Address'] ?><br><br>

	  
      [ <a href="EditAddressBook.php?AddressBook_ID=<?php echo $row['AddressBook_ID'] ?>">Edit</a> ]
      [ <a href="DeleteAddressBook.php?AddressBook_ID=<?php echo $row['AddressBook_ID'] ?>" class="del" >Delete</a> ]
      
    </li>
    			<?php
 						}
					} 
					else
					{
						?>
                        	<center>Not available!</center>
                        <?php
					}
					
				?>
    
</ul>
</table>
 <?php
                	$objPager->Generate_Pager(@$str);
                ?>

<br style="clear:both">
