<?PHP
function getStage ($complan, $username)
{
	for ($i = 1; $i <= 8; $i++)
	{
		$stage = 'stage'.$i;
		$ticker = $i - 1;
		if (scanStage($complan,$username,$stage)) {return $ticker;}
	}
}
function scanStage ($complan, $username, $stage)
{
	$getTree = getTree($complan);
	$mapStage = mapStage 
	(
		$getTree->stageCount,
		$getTree->rowCount,
		$getTree->ratio
	);
	$stage1 = $mapStage[$stage];
	$clause = '';
	foreach ($stage1 as $field => $count)
	{
		if ($field != 'sum') {$clause .= $field."='".$username."' OR ";}
	}
	$conn = $GLOBALS['CONN'];	
	$table = 'matrix';
	$sql = "SELECT id FROM ".$table." WHERE ".substr($clause,0,-4);
	$result = $conn->query($sql);
	if ($result->num_rows < $stage1['sum']) {return 1;}
}
function mapStage ($stageCount, $rowCount, $ratio)
{
	if ($stageCount && $rowCount && $ratio)
	{
		$z = $prev = 1;
		for ($x = 1; $x <= $stageCount; $x++)
		{
			$key = 'stage'.$x;
			for ($y = 1; $y <= $rowCount; $y++)
			{
				$row = 'row'.$z;
				if ($z == 1) {$array[$key][$row] = $prev;}
				else {$array[$key][$row] = $prev * $ratio;}
				$prev = $array[$key][$row];
				$z++;
			}
			$array[$key]['sum'] = array_sum($array[$key]);
		}
		return $array;
	}
	else
	{
		$complan = getEnums('complan');		
		$tree = getEnums('tree');
		foreach($tree as $key => $assoc)
		{
			$index = 'COMPLAN '.$complan[$key];
			$object = (object)$assoc;
			$array[$index] = mapStage 
			(
				$object->stageCount,
				$object->rowCount,
				$object->ratio
			);
		}
		return $array;
	}
}
function trackStage ($table, $user)
{
	// INSERT MATRIX
	$conn = $GLOBALS['CONN'];
	$username = $user->username;
	$complan = complan($user)->complan;
	$stage = complan($user)->stage;
	$post = array('username'=>$username,'complan'=>$complan,'stage'=>$stage);
	$exist = PYF_CRUD_OXIST($table,array_keys($post),array_values($post));
	if (!$exist)
	{
		$farr = PYF_CRUD_FIELDS($post);
		$rarr = PYF_CRUD_VALUES($post);
		$sql = "INSERT INTO ".$table." (".$farr.") VALUES (".$rarr.")";	
		$conn->query($sql);
		return PYF_CRUD_OXIST($table,array_keys($post),array_values($post));
	}
	return $exist;
}





?>