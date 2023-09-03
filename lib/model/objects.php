<?PHP
function widget ($array_tb)
{
	$conn = $GLOBALS['CONN'];
	foreach ($array_tb as $table)
	{
		$sql = "SELECT * FROM ".$table;
		$result = $conn->query($sql);
		if ($result->num_rows > 0) 
		{
			$object->$table->today = 0;
			while($row = $result->fetch_assoc()) 
			{
				$asDate = explode(' ',$row['eta']);
				if ($asDate[0] == PYF_GET_DATE())
					$object->$table->today += 1;
			}
			$object->$table->total = $result->num_rows;
		}
		else
		{
			$object->$table->today = 0;
			$object->$table->total = 0;
		}
	}
	return $object;	
}
function account ($table, $id)
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT * FROM ".$table." WHERE id='".$id."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {$object = $result->fetch_object();}
	return $object;	
}
function pinMatch ($table, $pin)
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT * FROM ".$table." WHERE pin LIKE '".$pin."%'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while ($row = $result->fetch_assoc())
			$array[] = $row;
	}
	return $array;	
}
function complan ($user)
{
	$obj->complan = toComplan($user);
	$localEnums = sortEnums($obj->complan);
	$obj->ticker = getStage($obj->complan,$user->username);
	$obj->stage = $localEnums->stage[$obj->ticker];
	$obj->title = $localEnums->title[$obj->ticker];
	$obj->earn = $localEnums->earn[$obj->ticker];
	if ($obj->ticker < 1) {$obj->target = $localEnums->starter;}
	else {$obj->target = $localEnums->master;}
	$obj->sponsor = $user->sponsor;
	$obj->upliner = upliner($user);
	$obj->childern = children($user);
	$obj->downliner = downliner($user);
	$obj->direct = direct($user);	
	$obj->close = count($obj->downliner);
	$obj->open = $obj->target - $obj->close;
	$history = lenGenx('matrix',$user->username);	
	$obj->total = count($history);
	return $obj;
}




?>