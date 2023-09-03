<?PHP
$NAV = 'records.php';
$BEAN = new DataAccessObject();

function setList ($schema)
{
	$DATABASE = $schema->database;
	$PATTERN = $schema->pattern;
	$TIMESTAMP = $schema->timestamp;
	
	$BEAN = $GLOBALS['BEAN'];
	$sql = "SHOW TABLES FROM ".$DATABASE." LIKE '%".$PATTERN."%'";
	$row = $BEAN->Execute($sql);
		
	$i = 0;	
	foreach ($row as $assoc)
	{
		$list[$i]["table"] = $table = current($assoc);
		$sql_2 = "SELECT * FROM ".$table;
		$row_2 = $BEAN->Execute($sql_2);
		$list[$i]["total"] = $num_rows = count($row_2);
		$today = 0;		
		if ($num_rows > 0)
		{
			foreach ($row_2 as $assoc_2)
			{
				if (isToday($assoc_2,$TIMESTAMP)) $today++;
			}
		}
		$list[$i]["today"] = $today;
		$i++;
	}
	return $list;
}

function getList ($list, $nav)
{
	foreach ($list as $row)
	{
		$table = $row["table"];	
		$query = '?'.GLOB1.'='.$table;
		$total = SAP_FORMAT_MONEY($row["total"]);
		$today = SAP_DISPLAY_BADGE($row["today"]);
		$action = 'href="'.$nav.$query.'"';	
	
		$buffer .= '<li>
			<a '.$action.'>
				<table border="0">
				<tr>
					<td>
						<var class="title">'.$table.'</var> &nbsp;&nbsp; 
						<var class="subtitle">('.$total.')</var>
					</td>
					<td align="right">'.$today.'</td>
				</tr>
				</table>
			</a>
		</li>';
	}
	$output = '<ul>'.$buffer.'</ul>'; 
	return $output;	
}




?>