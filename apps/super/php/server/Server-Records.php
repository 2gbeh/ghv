<?PHP
$TABLE = getGlobal(GLOB1,$SCHEMA->main);
$PRIKEY = $SCHEMA->prikey;
$NAV = 'update.php';
$BEAN = new DataAccessObject($TABLE);

// UNIT DEL
$http_delete = $_GET['delete'];
if (issetInt($http_delete))
{
	$execute = $BEAN->Delete(array($PRIKEY,$http_delete));
	if ($execute) {$err = "Row deleted successfully.";}
	else {$err = "!ERROR: Unable to delete row.";}	
}
// BATCH DEL
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$http_checkbox = $_POST['checkbox'];	
	if (isset($http_checkbox))
	{
		$sql = "DELETE FROM ".$TABLE." WHERE ".$PRIKEY." IN ";
		$sql .= "('".implode("','",array_values($http_checkbox))."')";
		$execute = $BEAN->Execute($sql);
		if ($execute) {$err = "Selected rows deleted successfully.";}
		else {$err = "!ERROR: Unable to delete selected rows.";}	
	}	
}
// DISPLAY
function getCaption ($table, $num_rows)
{
	$total = $GLOBALS['BEAN']->SIZE;
	$secs = date('s');
	if ($num_rows > 0) {$buffer = "Now showing rows 1 - ".$num_rows." (~<b>".$total."</b> total, query took 0.00".$secs." sec)";}
	else {$buffer = "MySQL returned an empty result set (i.e. zero rows, query took 0.00".$secs." sec)";} 
	$output = "<caption><a href=''>".$table."</a> ".$buffer."</caption>";
	return $output;	
}
function getHead ($table)
{
	$BEAN = $GLOBALS['BEAN'];
	$sql = "SHOW COLUMNS FROM ".$table;
	$row = $BEAN->Execute($sql);
		
	$buffer = '<th>';
	$buffer .= '<input type="checkbox" class="checkbox" onclick="$_checkAll(this)" /> ';
	$buffer .= 'S/N';
	$buffer .= '</th>';
	$buffer .= '<th>Task</th>';
	foreach ($row as $assoc)
		$buffer .= '<th>'.$assoc->Field.'</th>';
	$output = '<tr>'.$buffer.'<tr>';
	return $output;
}
function display ($table, $prikey, $nav)
{		
	$limit = 100;
	$http_search = $_GET['search'];
	$http_sort = $_GET['sort'];
	$http_pager = $_GET['pager'];
	
	if (isset($http_search)) {$clause = $http_search;}
	else if (isset($http_sort)) {$clause = "ORDER BY ".$prikey." ".$http_sort;}
	else
	{	
		if (isset($http_pager)) {$clause = SAP_DISPLAY_PAGER($table,$limit);}
		else {$clause = "ORDER BY ".$prikey." LIMIT ".$limit;}
	}
	
	$BEAN = $GLOBALS['BEAN'];
	$sql = "SELECT * FROM ".$table." ".$clause;
	$row = $BEAN->Execute($sql);

	$sn = 1;
	foreach ($row as $assoc) 
	{
		$id = $assoc->$prikey;
		$action = $nav.'?'.GLOB1.'='.$table.'&edit='.$id;
		
		$buffer = '<td><input type="checkbox" name="checkbox[]" value="'.$id.'" class="checkbox" /> '.$sn.'</td>';
		$buffer .= '<td>';
		$buffer .= '<a class="btn btn-pri" href="'.$action.'">Edit</a> &nbsp;';
		$buffer .= '<a class="btn btn-sec" onclick=$_unitDelete("'.$id.'")>Delete</a>';
		$buffer .= '</td>';
		foreach ($assoc as $cell) {$buffer .= '<td>'.$cell.'</td>';}
		$tbody .= '<tr>'.$buffer.'<tr>';	
		$sn++;
	}

	$caption = getCaption($table,count($row));
	$thead = getHead($table);
	$output = "<table>".$caption.$thead.$tbody."</table>";	
	return $output;
}


?>