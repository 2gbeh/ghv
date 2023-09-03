<?PHP
function PYF_VAL_TRIM ($post)
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
?>