<?php 
include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
include_once("config/manifest.php"); 	
include_once("config/connection.php");
include_once("lib/model/logic.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head charset="UTF-8">
<title>@Install</title>
</head>
<body>
<?php 
$run = false;
if ($run == true) {var_dump(execute());}
function execute ()
{
	$table_reg = "register";
	$table_trk = "tracker";
	$table_mat = "matrix";
	$conn = $GLOBALS['CONN'];
	
	$sql_reg = "SELECT * FROM ".$table_reg;
	$result_reg = $conn->query($sql_reg);
	if ($result_reg->num_rows > 0) 
	{
		$counter = 0;
		while ($row_reg = $result_reg->fetch_assoc())
		{
#			$USERNAME = 'Mr Gabby';			
			$USERNAME = $row_reg['username'];
			$PIN = toComplan($row_reg['pin']);
			$STAGE = $PIN == 'A' ? 'Stage 1' : 'Feeder Stage';
			$DATE = $row_reg['eta'];
			
			$sql_trk = "INSERT INTO ".$table_trk." (username,complan,stage,eta) ";
			$sql_trk .= "VALUES ('".$USERNAME."','".$PIN."','".$STAGE."','".$DATE."')";
			if ($conn->query($sql_trk) == true) {$counter++;}

			if ($PIN == 'A')
			{
				$STAGE = 'Stage 2';
				$sql_mat = "SELECT eta FROM ".$table_mat." WHERE row2='".$USERNAME."' OR row3='".$USERNAME."'";
				$result_mat = $conn->query($sql_mat);
				if ($result_mat->num_rows >= 6)
				{
					while ($row_mat = $result_mat->fetch_assoc()) {$array_mat[] = current($row_mat);}
					$DATE = end($array_mat);
					$sql_trk = "INSERT INTO ".$table_trk." (username,complan,stage,eta) ";
					$sql_trk .= "VALUES ('".$USERNAME."','".$PIN."','".$STAGE."','".$DATE."')";
					if ($conn->query($sql_trk) == true) {$counter++;}
				}
			}
			if  ($PIN == 'B')
			{
				$STAGE = 'Stage 1';				
				$sql_mat = "SELECT eta FROM ".$table_mat." WHERE row2='".$USERNAME."'";
				$result_mat = $conn->query($sql_mat);
				if ($result_mat->num_rows >= 3)
				{
					while ($row_mat = $result_mat->fetch_assoc()) {$array_mat[] = current($row_mat);}
					$DATE = end($array_mat);
					$sql_trk = "INSERT INTO ".$table_trk." (username,complan,stage,eta) ";
					$sql_trk .= "VALUES ('".$USERNAME."','".$PIN."','".$STAGE."','".$DATE."')";
					if ($conn->query($sql_trk) == true) {$counter++;}
				}
			}
		}
	}
	return $counter;	
}

?>
</body>
</html>