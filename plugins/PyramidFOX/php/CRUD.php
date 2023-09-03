<?PHP
function PYF_CRUD_FIELDS ($array) 
{
	$buffer = "";
	foreach ($array as $key => $value) {$buffer .= $key.",";}
	return substr($buffer,0,-1);
}
function PYF_CRUD_VALUES ($array) 
{
	$buffer = "";
	foreach ($array as $value) {$buffer .= "'".$value."',";}
	return substr($buffer,0,-1);
}
function PYF_CRUD_SET ($array) 
{
	$buffer = "";
	foreach ($array as $key => $value) {$buffer .= $key."='".$value."',";}
	return substr($buffer,0,-1);
}
function PYF_CRUD_WHERE ($field, $value) 
{
	if (is_array($field) && is_array($value))
	{
		$buffer = "";
		for ($i = 0; $i < count($field); $i++)
			$buffer .= $field[$i]."='".$value[$i]."' AND ";
		$output = substr($buffer,0,-5);
	}
	else
		$output = $field."='".$value."'";
	return $output;
}
function PYF_CRUD_EXIST ($table, $field, $value)
{
	$conn = $GLOBALS['CONN'];
	$where = PYF_CRUD_WHERE($field,$value); 
	$sql = "SELECT id FROM ".$table." WHERE ".$where;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {while($row = $result->fetch_assoc()) return $row['id'];}
	else {return 0;}
}
function PYF_CRUD_OXIST ($table, $field, $value)
{
	$conn = $GLOBALS['CONN'];
	$where = PYF_CRUD_WHERE($field,$value); 
	$sql = "SELECT * FROM ".$table." WHERE ".$where;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {return $result->fetch_object();}
	else {return 0;}
}
function PYF_CRUD_LOGIN ($table, $post)
{
	$key = array_keys($post);
	$val = array_values($post);
	$username = PYF_CRUD_EXIST($table,$key[0],$val[0]);
	if (!$username) return "#401";
	else
	{
		$password = PYF_CRUD_EXIST($table,$key,$val);
		if (!$password) return "#402";
		else return $password;
	}
}
function PYF_CRUD_BYID ($table, $id)
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT * FROM ".$table." WHERE id='".$id."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {return $result->fetch_object();}
}
function PYF_CRUD_DROP ($table, $clause)
{
	$conn = $GLOBALS['CONN'];
	if (strpos($clause,'='))
	{
		$sql = "DELETE FROM ".$table." WHERE ".$clause;
		if ($conn->query($sql) === TRUE) {return 1;}
		else {return 0;}
	}
}
function PYF_CRUD_DELID ($table, $id)
{
	$conn = $GLOBALS['CONN'];
	$sql = "DELETE FROM ".$table." WHERE id='".$id."'";
	if ($conn->query($sql) === TRUE) {return 1;}
	else {return 0;}
}
function PYF_CRUD_UNIQUE ($table, $post, $where)
{
	$conn = $GLOBALS['CONN'];
	$exist = PYF_CRUD_EXIST($table,$where[0],$where[1]);
	if ($exist)
	{
		$set = PYF_CRUD_SET($post);
		$sql = "UPDATE ".$table." SET ".$set." WHERE id='".$exist."'";
		if ($conn->query($sql) === TRUE) {return 1;}
		else {return 0;}		
	}
	else
	{
		$farr = PYF_CRUD_FIELDS($post);
		$rarr = PYF_CRUD_VALUES($post);
		$sql = "INSERT INTO ".$table." (".$farr.") VALUES (".$rarr.")";	
		if ($conn->query($sql) === TRUE) {return 1;}
		else {return 0;}
	}
}
function PYF_CRUD_SEED ($table, $postArray)
{
	$conn = $GLOBALS['CONN'];	
	foreach ($postArray as $post)
	{
		$farr = PYF_CRUD_FIELDS($post);
		$rarr = PYF_CRUD_VALUES($post);
		$sql = "INSERT INTO ".$table." (".$farr.") VALUES (".$rarr.")";	
		$conn->query($sql);
	}
	return 1;
}
function PYF_CRUD_SELECT ($table, $field, $value)
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT * FROM ".$table." WHERE ".$field."='".$value."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
			$dimArray[] = $row;
		return $dimArray;
	}
}

?>