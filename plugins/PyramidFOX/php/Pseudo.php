<?PHP
function redir ($dir)
{
	echo '<script type="text/javascript">location.assign("'.$dir.'");</script>';	
}
function dump ($args) {var_dump($args);}
function toUpper ($args) {return strtoupper($args);}
function toLower ($args) {return strtolower($args);}
function toTitle ($args) {return ucwords(strtolower($args));}
function toNumber ($args) 
{
	$args = str_replace('.00','',$args);
	$args = str_replace(',','',$args);
	$args = str_replace(' ','',$args);	
	for ($i = 0; $i < strlen($args); $i++) {$array[] = (int)$args[$i];}
	$output = implode('',$array);
	return (int)$output;
}
function toMoney ($args) 
{
    if (is_double($args) || strlen($args) <= 3) {return $args;}
    else
    {
		$args = toNumber($args);
		return number_format($args);
    }
}
function t_time ($timestamp) 
{
	$array = explode(" ",$timestamp);
	$strtotime = strtotime($array[1]);
	return date("h:i A",$strtotime);
}
function t_date ($timestamp) 
{
	$array = explode(" ",$timestamp);
	$strtotime = strtotime($array[0]);
	return date("D, M j, Y",$strtotime);
}
function t_eta ($timestamp) 
{
	$array = explode(" ",$timestamp);
	$strtotime = strtotime($array[0]);
	$date = date("D, M j, Y",$strtotime);
	$strtotime = strtotime($array[1]);
	$time = date("h:i A",$strtotime);	
	return $date.' '.$time;
}
function f_date ($timestamp) 
{
	$array = explode(" ",$timestamp);
	$strtotime = strtotime($array[0]);
	return date("M j, Y",$strtotime);
}
function keygen ($args = 6)
{
	$buffer = "";
	for ($i = 0; $i < $args; $i++)
		$buffer .= mt_rand(0,9);
	return $buffer;
}
function toSex ($args)
{
	if ($args > 0) {return 'F';}
	else {return 'M';}	
}
function toGender ($args)
{
	if ($args > 0) {return 'Female';}
	else {return 'Male';}	
}
function toMarital ($args)
{
	$array = PYF_ENUM('marital');
	return $array[$args];
}
function smartDate ($args)
{
	if (strpos($args,'/')) {$delmt = '/';}
	else if (strpos($args,'.')) {$delmt = '.';}	
	else {$delmt = '-';}
	$d = explode($delmt,$args);
	if (strlen($d[0]) == 4)	{$mktime = mktime(0,0,0,$d[1],$d[2],$d[0]);}
	else {$mktime = mktime(0,0,0,$d[1],$d[0],$d[2]);}
	return date("M j, Y",$mktime);
}
function smartMail ($from, $to, $subject, $message, $server)
{	
	if ($server) {$headers = $server." <".$from.">";}
	else {$headers = $from;}
	if (mail($to,$subject,$message,"From: ".$headers))
		return array($to,$subject,$message,$headers);
}
function toArray ($args) {return (array)$args;}
function toObject ($args) {return (object)$args;}
function renewal ($args)
{
	$pair = explode(' - ',$args);
	
	$start = explode('/',$pair[0]);
	$end = explode('/',$pair[1]);
	$now = explode('/',date('d/m/Y'));
	
	$mktime_start = $start[2].'-'.$start[1].'-'.$start[0];
	$mktime_end = $end[2].'-'.$end[1].'-'.$end[0];
	$mktime_now = $now[2].'-'.$now[1].'-'.$now[0];
			
	$date_diff = date_diff(date_create($mktime_start),date_create($mktime_end));
	$total = $date_diff->format("%a");
	$date_diff = date_diff(date_create($mktime_start),date_create($mktime_now));
	$frac = $date_diff->format("%a");
	$perc = round(($frac * 100) / $total);
	
	if ($perc <= 33) {$hex = '#00A65A';}
	else if ($perc >= 34 && $perc <= 66) {$hex = '#F39C12';}
	else {$hex = '#DD4B39';}
	
	$style_ink = 'background-color:'.$hex.'; 
	color:#FFF;  
	width:'.$perc.'%; 
	text-align:center; 
	font-size:10px; 
	font-weight:bold; 
	cursor:pointer; 
	display:inline-block;';
	$style_caption = 'padding:5px 10px;
	color:'.$hex.'; 
	text-align:right; 
	font-size:12px; 
	font-weight:bold;';
	$title = $total - $frac.' days left';
	$present = date("D, M j, Y",mktime(0,0,0,$end[1],$end[0],$end[2]));
	$footer = 'Domain Renewal: '.$present;
	return '<ol style="background-color:lavender;">
		<li style="'.$style_ink.'" title="'.$title.'">'.$perc.'%</li>
	</ol><div style="'.$style_caption.'">'.$footer.'</div>';
}

?>