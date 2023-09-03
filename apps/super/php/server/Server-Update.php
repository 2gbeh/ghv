<?PHP
$TABLE = getGlobal(GLOB1,$SCHEMA->main);
$PRIKEY = $SCHEMA->prikey;	
$NAV = 'records.php';
$BEAN = new DataAccessObject($TABLE);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$ID = array_pop($_POST);	
	$_POST = SAP_FORM_VAL($_POST);
	
	if ($_POST)
	{
#		var_dump($_POST,$prikey,$id); return 1;
		$execute = $BEAN->Update($_POST,array($PRIKEY,$ID));
		if ($execute) {$err = "Row updated successfully. <a href='".$NAV."'>Return</a>";}
		else {$err = "!ERROR: Unable to update row.";}
	}
}
    
function getEditor ($database, $table, $prikey)
{
	$http_edit = getGlobal('edit');
	if (issetInt($http_edit))
	{
		$buffer = '<tr>
			<td><label>Table :</label></td>
			<td><input type="text" value="'.$table.'" disabled /></td>
		</tr>';
		$row = $database->Display($table,$http_edit);		
		foreach ($row as $key => $value)
		{
			$attrib = $key == $prikey ? "readonly" : "";
			$buffer .= '<tr>
				<td><label>'.$key.' :</label></td>
				<td><input type="text" name="'.$key.'" value="'.$value.'" '.$attrib.' /></td>
			</tr>';
		}
		$output = $buffer.'<tr>
			<td>&nbsp;</td>    
			<td><input type="submit" value="Update" /></td>
		</tr>';
		return $output;	
	}
}


?>