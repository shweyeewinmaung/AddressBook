<?php
class pager
{
	public $pageSize,$currentPageIndex;
	public $offset,$maxPage;
	public $totalRecordCount;
	
	//Constructor
	function __construct($pageSize,$currentPageIndex)
	{
		//Page Size
		$this->pageSize=$pageSize;
		//by default we show first page
		$this->currentPageIndex=$currentPageIndex;		
		//counting the offset
		$this->offset=($currentPageIndex-1)*$pageSize;
	}	

/////////////////////////// All AddressBook///////////////////////////
	
	function SearchData_GetAllAddressBook()
	{
		$sql="SELECT * FROM `tbl_addressbook` ORDER BY AddressBook_ID DESC ";
		return $sql;
	}
	
	/////////////////////////// All Car ///////////////////////////
	//function Search_Data($tableName,$orderByFieldName)

	function Search_Data($str)
	{
		
		$sql= $str . " LIMIT $this->offset,$this->pageSize";
		$this->totalRecordCount=$this->Search_TotalRecordCount($str);
		//how many pages
		$this->maxPage=ceil($this->totalRecordCount/$this->pageSize);	
		$result=mysql_query($sql) or die(mysql_error());
		return $result;
	}

	/********************************************************************/	

	function Search_TotalRecordCount($sql)
	{
		//If no search key is defined
		$ret=mysql_query($sql);
		$num=mysql_num_rows($ret);
		return $num;					
	}

	/********************************************************************/

	function Generate_Pager($str)
	{
		/********************************************************************/
		// creating previous and next link
		// plus the link to go straight to
		// the first and last page
		/********************************************************************/				
		
		//the name of the current page	
		$self = $_SERVER['PHP_SELF'];
		/********************************************************************/
		// "Previous" and "First" page link

		if ($this->currentPageIndex>1)
		{
			$pageIndex=$this->currentPageIndex-1;					
			echo "<a href='$self?page=1&$str'>[First]</a>&nbsp;";
			echo "<a href='$self?page=$pageIndex&$str'>[Prev]</a>&nbsp;";							
		}

		else

		{}								

		/********************************************************************/
		// print the link to access each page

		$b=false;

		for($i=1;$i<=$this->maxPage;$i++)
		{
			if ($i==$this->currentPageIndex)
			{
				echo $i . "&nbsp;";
			}

			else
			{
				
			}
		}

		/********************************************************************/

		// "Next" and "Last" page link
		if ($this->currentPageIndex<$this->maxPage)
		{
			$pageIndex=$this->currentPageIndex+1;
			echo "<a href='$self?page=$pageIndex&$str'>[Next]</a>&nbsp;";
			echo "<a href='$self?page=$this->maxPage&$str'>[Last]</a>&nbsp;";
			echo " of total " . $this->maxPage;
		}

		else

		{}

		/********************************************************************/

	}
	/********************************************************************/

}	

?>