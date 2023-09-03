<?PHP
$TABLE = getGlobal(GLOB1,$SCHEMA->main);
$PRIKEY = $SCHEMA->prikey;	
$NAV = 'records.php';
$BEAN = new DataAccessObject($TABLE);

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = SAP_FORM_STRICT($_POST);
	if ($_POST)
	{
#		var_dump($_POST); return 1;
		$execute = $BEAN->Create($_POST);
		if ($execute) {$err = "Row inserted successfully. <a href='".$NAV."'>Return</a>";}
		else {$err = "!ERROR: Unable to insert row.";}
	}
}

function getSelector ($table)
{
	$SCHEMA = $GLOBALS['SCHEMA'];	
	$DATABASE = $SCHEMA->database;
	$PATTERN = $SCHEMA->pattern;
	
	$BEAN = $GLOBALS['BEAN'];
	$sql = "SHOW TABLES FROM ".$DATABASE." LIKE '%".$PATTERN."%'";
	$row = $BEAN->Execute($sql);

	$buffer = '<option></option>';		
	foreach ($row as $assoc)
	{
		$value = current($assoc);
		if ($table == $value)
			$buffer .= '<option selected>'.$value.'</option>';
		else
			$buffer .= '<option>'.$value.'</option>';
	}			
	$output = '<tr>
        <td><label>Table :</label></td>
        <td><select onChange=$_goto("?'.GLOB1.'="+this.value)>'.$buffer.'</select></td>
    </tr>';
	return $output;
}
    
function getEditor ($table, $prikey)
{	
	if ($table)
	{
		$BEAN = $GLOBALS['BEAN'];
		$sql = "SHOW COLUMNS FROM ".$table;
		$row = $BEAN->Execute($sql);	

		foreach ($row as $assoc)
		{
			$name = current($assoc);
			if ($name != $prikey)
			$buffer .= '<tr>
				<td><label>'.$name.' :</label></td>
				<td><input type="text" name="'.$name.'" value="'.$_POST[$name].'" /></td>
			</tr>';
		}
		$output = $buffer.'<tr>
			<td>&nbsp;</td>    
			<td><input type="submit" value="Save" /></td>        
		</tr>';
		return $output;	
	}
}


?>