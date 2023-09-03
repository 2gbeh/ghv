<?PHP
function toBadge ($args)
{
	if ($args > 0) {return '<div class="badge">'.$args.'</div>';}
}
function toLabel ($args)
{
	return '<span style="padding:2px 5px; 
	background-color:#EE1111; 
	color:#FFF; 
	font-size:10px; 
	border-radius:10px;">'.$args.'</span>';
}
function toComplan ($args)
{
	if (is_object($args) && $args->pin) {return substr($args->pin,0,1);}
	else if (is_array($args) && $args['pin']) {return substr($args['pin'],0,1);}	
	else if (strlen($args) > 1) {return substr($args,0,1);}
	else {return $args;}
}
function getEnums ($key) {return $GLOBALS['ENUMS'][$key];}
function sortEnums ($complan) 
{
	$map = $GLOBALS['ENUMS'];
	$complan = toComplan($complan);
	if (in_array($complan,$map['complan']))
	{
		$pointer = array_search($complan,$map['complan']);
		foreach ($map as $key => $assoc)
		{
			if (array_key_exists($pointer,$assoc))
				$object->$key = $assoc[$pointer];
		}
		return $object;	
	}
}
function sortTicker ($enumOf, $complan, $ticker) 
{
	$complan = toComplan($complan);
	$sortEnums = sortEnums($complan);
	$array = $sortEnums->$enumOf;
	return $array[$ticker];
}
function getTree ($complan) 
{
	$sortEnums = sortEnums($complan);
	return (object)$sortEnums->tree;
}
function getParent ($complan, $p) 
{
	$sortEnums = sortEnums(toComplan($complan));
	$parent = $sortEnums->parent;
	foreach ($parent as $key => $csv)
	{
		$pair = explode(',',$csv);
		if (in_array($p,$pair)) {return $key;}
	}
}
function ivcap ($complan) 
{
	$sortEnums = sortEnums(toComplan($complan));
	return $sortEnums->ivcap;
}
function pill ($table) 
{
	$today = $GLOBALS['WIDGET']->$table->today;
	return toBadge($today);
}
function getDatalist ($table = 'register', $field = 'username') 
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT ".$field." FROM ".$table;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
#			$buffer[] = $row[$field];
			$buffer .= '<option value="'.$row[$field].'" />';
	}
	return '<datalist id="mylist">'.$buffer.'</datalist>';
}


?>