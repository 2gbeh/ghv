<?PHP
function SAP_FORMAT_NUMBER ($args) 
{
	$args = str_replace('.00','',$args);
	$args = str_replace(',','',$args);
	$args = str_replace(' ','',$args);	
	for ($i = 0; $i < strlen($args); $i++) {$array[] = (int)$args[$i];}
	$output = implode('',$array);
	return (int)$output;
}
function SAP_FORMAT_MONEY ($args) 
{
    if (is_double($args) || strlen($args) <= 3) {return $args;}
    else
    {
		$args = SAP_FORMAT_NUMBER($args);
		return number_format($args);
    }
}

?>
