<?PHP
function issetInt ($args)
{
	if (isset($args) && is_numeric($args) && $args > 0) {return true;}
}
function issetStr ($args)
{
	if (isset($args) && strlen($args) > 0) {return true;}
}
function isToday ($object, $fields)
{
	foreach ($fields as $name)
	{
		$cell = $object->$name;
		if 
		(
			substr($cell,0,4) == date("Y") && 
			substr($cell,5,2) == date("m") && 
			substr($cell,8,2) == date("d")
		)
		return true;
	}
}
function getGlobal ($query, $default = false)
{
	if (isset($_GET[$query])) {$output = $_SESSION[$query] = $_GET[$query];}
	else if (isset($_SESSION[$query])) {$output = $_SESSION[$query];}
	else {$output = $_SESSION[$query] = $default;}
	return $output;
}
function getMeter ($date_str)
{
	$obj = SAP_DISPLAY_RENEWAL($date_str); 
	$start = str_replace(' ','_',$obj->start_date);
	$end = str_replace(' ','_',$obj->end_date);
	$left = $obj->days_left;
	$perc = $obj->perc_used.'%';
	$bg = $obj->indicator;
	$alert = '***_Domain_Renewal_***\n';
	$alert .= 'Start_Date:_'.$start.'\n';
	$alert .= 'End_Date:_'.$end.'\n';
	$alert .= 'Days_Left:_'.$left.'\n';
	$alert .= 'Percentage:_'.$perc;
	$output = '<ol onClick=alert("'.$alert.'") class="graph-tube" title="'.$perc.'">
		<li class="graph-ink" style="background-color:'.$bg.'; width:'.$perc.';">&nbsp;</li>
	</ol>';
	return $output;
}
?>

