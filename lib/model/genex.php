<?PHP
function getGenx ($table, $username)
{
	// COMPILE MATRIX
	$entry['row1'] = $username;
	for ($i = 2; $i <= 24; $i++)
	{
		$row = 'row'.$i;
		$prev = 'row'.($i - 1);
		$obj = PYF_CRUD_OXIST($table,'username',$entry[$prev]);
		if ($obj->sponsor && $obj->sponsor != $entry[$prev])
			$entry[$row] = $obj->sponsor;
	}
	return $entry;	
}
function setGenx ($table, $post)
{
	// INSERT MATRIX
	$conn = $GLOBALS['CONN'];
	$farr = PYF_CRUD_FIELDS($post);
	$rarr = PYF_CRUD_VALUES($post);	
	$sql = "INSERT INTO ".$table." (".$farr.") VALUES (".$rarr.")";	
	if ($conn->query($sql) === TRUE) {return 1;}
	else {return 0;}
}
function lenGenx ($table, $username)
{
	// SIZEOF MATRIX
	$conn = $GLOBALS['CONN'];	
	for ($i = 2; $i <= 24; $i++)
	{
		$field = 'row'.$i;
		$sql = "SELECT row1 FROM ".$table." WHERE ".$field."='".$username."'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) {$list[] = $row['row1'];}
		}		
	}
	return $list;
}

?>