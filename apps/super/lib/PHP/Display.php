<?PHP
function SAP_DISPLAY_ERROR ($err)
{
	if ($err || $_GET['err'])
	{
		if ($_GET['err']) $err = $_GET['err'];
		$code = substr($err,0,1);
		$message = substr($err,1);
		if ($code == "!") $color = 'ERROR-DANGER';
		else if ($code == "@") $color = 'ERROR-WARNING';
		else if ($code == "#") $color = 'ERROR-INFO';
		else {$color = 'ERROR-SUCCESS'; $message = $err; $_POST = array();}
		$output = "<div class='ERROR ".$color."' id='ERROR'>
			<span class='ERROR-CANCEL' title='Close' onClick=document.getElementById('ERROR').style.display='none'>&times;</span>
			<b>".$message."</b>
		</div>";
		return $output;			
	}
}
function SAP_DISPLAY_BADGE ($args) 
{
	if ($args > 0)
	{
		$format = SAP_FORMAT_MONEY($args);
		$output = '<var class="badge">'.$format.'</var>';
		return $output;
	}
}
function SAP_DISPLAY_PAGER ($name, $limit = 10)
{
	// get current request
	if (!isset($_GET['pager'])) {$page = 1;}
	else {$page = $_GET['pager'];}
	// get previous request
	$cname = "pager-".$name;
	if (!isset($_COOKIE[$cname])) {$last = 1;}
	else {$last = (int)$_COOKIE[$cname];}
	// compute prev and next
	if ($page == 'prev' && $last == 1) {$page = $last;}	
	if ($page == 'prev' && $last >= 2) {$page = $last - 1;}
	if ($page == 'next') {$page = $last + 1;}
	if ($page == 'end') {$page = $last;}
	// set new request
	setcookie($cname,$page);
	// set new offset
	$offset = ($page-1) * $limit;
	return "LIMIT ".$limit." OFFSET ".$offset;
}
function SAP_DISPLAY_RENEWAL ($args, $date_f = "D, M j, Y")
{
	# DD/MM/YYYY - DD/MM/YYYY
	$slice = explode(' - ',$args);
	# DD/MM/YYYY
	$start_arr = explode('/',$slice[0]);
	$end_arr = explode('/',$slice[1]);
	$now_arr = explode('/',date('d/m/Y'));
	# YYYY-MM-DD
	function reform ($arr) 
	{
		$format = $arr[2].'-'.$arr[1].'-'.$arr[0];
		return $format;
	}
	$start_f = reform($start_arr);
	$end_f = reform($end_arr);
	$now_f = reform($now_arr);
	# DIFFRENCE
	function diff ($from, $to) 
	{
		$diff = date_diff(date_create($from),date_create($to));
		$format = $diff->format("%a");
		return $format;		
	}
	# PREPARE
	$total_diff = diff($start_f,$end_f);
	$frac_diff = diff($start_f,$now_f);
	$left = $total_diff - $frac_diff;
	$perc = round(($frac_diff * 100) / $total_diff);
	if ($perc <= 33) {$color = '#00A65A';}
	else if ($perc >= 34 && $perc <= 66) {$color = '#F39C12';}
	else {$color = '#DD4B39';}	
	function preset ($date_f, $arr) 
	{
		$day = $arr[0];
		$month = $arr[1];
		$year = $arr[2];
		$format = date($date_f,mktime(0,0,0,$month,$day,$year));
		return $format;
	};
	$object->start_date = $start_f;
	$object->start_date_preset = preset($date_f,$start_arr);	
	$object->end_date = $end_f;
	$object->end_date_preset = preset($date_f,$end_arr);		
	$object->now_date = $now_f;
	$object->now_date_preset = preset($date_f,$now_arr);	
	$object->total_diff = $total_diff;
	$object->frac_diff = $frac_diff;
	$object->days_left = $left;	
	$object->perc_used = $perc;
	$object->indicator = $color;
	return $object;
}

?>