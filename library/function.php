<?php
function AutoID($tableName, $FieldName, $Prefix, $NoOfZero)
{
	$sql="SELECT * FROM " . $tableName . " ORDER BY " . $FieldName . " DESC";
	$ret=mysql_query($sql);
	$num=mysql_num_rows($ret);
	if($num<1)
	{
		return $Prefix . str_pad("1", $NoOfZero, "0", STR_PAD_LEFT);
	}
	else
	{
		$row=mysql_fetch_array($ret);
		$OldID=$row[$FieldName];
		$Temp = explode("-", $OldID);
		$Value=$Temp[1];
		$Value++;
		$NewID=$Prefix . str_pad($Value, $NoOfZero, "0", STR_PAD_LEFT);
		return $NewID;
	}
}
?>