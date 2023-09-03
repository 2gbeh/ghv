<?PHP
function SAP_FORM_POST () 
{
	$action = 'action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" ';
	$method = 'method="POST" ';
	$autoc = 'autocomplete="off"';
	return $action.$method.$autoc;
}
function SAP_FORM_GET () 
{
	$action = 'action="'.htmlspecialchars($_SERVER["PHP_SELF"]).'" ';
	$method = 'method="GET" ';
	$autoc = 'autocomplete="off"';
	return $action.$method.$autoc;
}
function SAP_FORM_VAL ($post)
{
	foreach ($post as $name => $value)
	{
		if (substr($name,0,7) != 'submit-')
		{
			$value = trim($value);
			$value = stripslashes($value);
			$value = htmlspecialchars($value);
			$array[$name] = $value;
		}		
	}
	return $array;		
}
function SAP_FORM_STRICT ($post)
{
	$post = SAP_FORM_VAL($post);
	foreach ($post as $name => $value)
	{
		if (strlen($value) > 0) {$array[$name] = $value;}
	}
	return $array;		
}

?>