<?PHP
function sponsor ($table, $sponsor)  
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT * FROM ".$table." WHERE username='".$sponsor."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {$object = $result->fetch_object();}
	else 
	{
		$object->fullname = 
		$object->phone = 
		$object->username = 
		$object->pin = 		
		$object->id = 'N/A';
	}
	return $object;
}
function upliner ($user) 
{
	$table = "upliner";
	$table_2 = "register";	
	$row = PYF_CRUD_OXIST($table,'member',$user->username);
	if ($row) {$object = PYF_CRUD_OXIST($table_2,'username',$row->upliner);}
	else
	{
		$object->fullname = "N/A";		
		$object->phone = "N/A";
		$object->username = "Unassigned";
	}
	return $object;
}
function children ($user)  
{
	$table = 'matrix';		
	return lenGenx($table,$user->username);
}
function direct ($user)  
{
	$table = 'matrix';		
	$conn = $GLOBALS['CONN'];
	if (toComplan($user) == 'A')
		$sql = "SELECT row1 FROM ".$table." WHERE row2='".$user->username."' OR row3='".$user->username."'";
	else
		$sql = "SELECT row1 FROM ".$table." WHERE row2='".$user->username."'";	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) {$them[] = $row['row1'];}
		return $them;
	}
}
function downliner ($user)
{
	$theComplan = toComplan($user);
	$myStage = getStage($theComplan,$user->username);
	$myKids = children($user);
	if ($myStage < 1) {return $myKids;}
	else
	{
		foreach ($myKids as $child)
		{
			$theirStage = getStage($theComplan,$child);
			if ($myStage === $theirStage) {$them[] = $child;}
		}
		return $them;
	}
}

?>