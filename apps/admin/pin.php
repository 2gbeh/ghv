<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("../../lib/model/meta.php"); 
		include_once("plugins/PyramidFOX/css/@lib(css).php");		
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php"); 		
	?>
	<title>Transaction Pins | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />       
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="pin">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
	<div class="caption">Transaction Pins</div>
    <div class="wrap">
    <table class="tmp-report">
    <?php
		$table = "pin";
		$sql = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 100";
		$result = $CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$output = "";
			 while($row = $result->fetch_assoc()) 
			 {
				 $output .= '<tr>
					<td>
						<div class="report-title">'.$row['username'].'</div> 
						<div class="report-meta">'.f_date($row['eta']).'</div>
						<div class="report-article"><a>PIN:</a> '.$row['pin'].'</div>						
					</td>    
				</tr>';
			 }
		}
		else {$output = "<tr><td><a>No records found</a></td></tr>";}
		$CONN->close();	
		echo $output;		
	?>    
    </table>
    </div>
</div>
<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
