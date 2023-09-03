<?PHP
function getMatrix ($table, $user) 
{
	$list[] = array($user->fullname,$user->username,$user->id);
	$cobject = complan($user);
	$array = $cobject->downliner;
	foreach ($array as $username)
	{
		$isDirect = in_array($username,direct($user)) ? true : false;
		$row = PYF_CRUD_OXIST($table,'username',$username);
		$list[] = array($row->fullname,$row->username,$row->id,$isDirect);
	}
	return $list;
}

function setMatrix ($key)
{
	if (isset($GLOBALS['THIS_MATRIX'])) {$matrix = $GLOBALS['THIS_MATRIX'];}
	else {$matrix = $GLOBALS['MATRIX'];}
	$title = 'No. '.($key + 1);
	if (is_numeric($key) && array_key_exists($key,$matrix))
	{
		$object->color = 'py-close';
		$object->fullname = toTitle($matrix[$key][0]);
		$object->username = '('.$matrix[$key][1].')';
		$object->id = $matrix[$key][2];
		// EXTRA
		$action = trackMatrix($matrix[$key][1]);
		$object->action = 'onclick=alert("'.$action.'")';
		$mark = '<var class="direct" title="Direct Invite">*</var>';
		$object->direct = $matrix[$key][3] == true ? $mark : '';
	}
	else
	{
		$object->color = 'py-open';
		$object->fullname = '&nbsp;';
		$object->username = '&nbsp;';		
		$object->id = false;
	}
	$output = '<div class="pyramid py-large" id="'.$object->color.'" '.$object->action.' title="'.$title.'">&nbsp;</div>
	<div class="user">'.$object->fullname.'</div>
	<div class="meta">'.$object->username.' '.$object->direct.'</div>';
	return $output;
}

function trackMatrix ($username)
{
	$conn = $GLOBALS['CONN'];
	$table = "tracker";
	$sql = "SELECT eta FROM ".$table." WHERE username='".$username."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		while ($row = $result->fetch_assoc()) {$array[] = current($row);}
		$pair = explode(' ',end($array));
		$buffer = 'Username:...'.$username.'\n';
		$buffer .= 'Joined:...'.$pair[0].'\n';
		$buffer .= 'Time:...'.$pair[1];
		return $buffer;
	}
}


?>