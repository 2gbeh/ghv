<?PHP
// EXCEPTION
set_error_handler(function($errno,$error,$file,$line){});
// START
$sandbox = false;
$collection = $_SERVER;
if ($sandbox == true) {
var_dump 
(
	$collection
);}

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="utf-8" />
	<title>$_SERVER</title>
  <style type="text/css">
	body {color:#333; font-family:Arial, Helvetica, sans-serif; font-size:14px;}
	table {border-collapse:collapse;}
	caption {padding:10px 15px; margin-bottom:10px; background-color:#ebf8a4; text-align:left; border:solid thin #5da555; border-radius:5px 5px 0 0; border-bottom:none;}
	th {padding:5px 10px; background-color:#dfdfdf; color:#235a93; font-weight:bold; border:solid thin #fff;}
	th {
    background: #dfdfdf; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#fff, #dfdfdf); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#fff, #dfdfdf); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#fff, #dfdfdf); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#fff, #dfdfdf); /* Standard syntax */
	}	
	th:hover {text-decoration:underline; cursor:pointer;}
	td {padding:10px; font-weight:lighter; line-height:1.2;}
	td[nowrap="true"] {white-space:nowrap;}	
	tr:nth-child(even) td {background-color:#dfdfdf;}
	tr:hover td {background-color:#bdcbd9;}
	</style>
</head>
<body>
	<table border="0" width="100%" summary="error log">
  <tr>
  	<th title="S/N">#</th>
  	<th title="">KEY</th>
  	<th title="gettype($e)">TYPE</th>
  	<th title="strlen($e)">LENGTH</th>        
  	<th title="">VALUE</th>
  </tr>
  <?php 
		// CAPTION
		$total = count($collection);
		$index = $total - 1;
		$secs = date('s');	
		$success = 'Showing rows 0 - '.$index.' (~'.$total.' total, Query took 0.00'.$secs.' seconds.)';
		$failed = 'MySQL returned an empty result set (i.e. zero rows). (Query took 0.00'.$secs.' seconds.)';
		$caption = $total > 0? $success : $failed;
		echo '<caption>&#10004; '.$caption.'</caption>';	
		// BODY
		$sn = 1;
		$buffer = '';
		foreach ($collection as $i => $e)
		{
			$buffer .= '<tr valign="top">';
			$buffer .= '<td align="right">'.$sn.'</td>';			
			$buffer .= '<td nowrap="true">'.$i.'</td>';
			$buffer .= '<td>'.gettype($e).'</td>';			
			$buffer .= '<td align="right">'.strlen($e).'</td>';
			$buffer .= '<td>'.htmlspecialchars($e).'</td>';			
			$buffer .= '</tr>';
			$sn++;
		}
		echo $buffer;
	?>
  </table>
</body>
</html>





