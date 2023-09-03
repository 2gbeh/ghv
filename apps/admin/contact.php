<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");
	include_once("php/local/smartdel.php");	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		$noviewport = true;	
		include_once("../../lib/model/meta.php"); 
		include_once("plugins/PyramidFOX/css/@lib(css).php");		
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php"); 			
	?>
	<title>Enquiry Records | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="enquiry">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Enquiry Records</div>
    <div class="wrap overflow">
	<?php echo PYF_DISPLAY_ERROR($err); ?>         
    <table class="tmp-table">
    <?php
		$table = "contact";
		$sql = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 100";
		$result = $CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$output = "";
			$sn = 1;
			 while($row = $result->fetch_assoc()) 
			 {
				 $output .= '<tr>
					<td><a class="btn btn-sec" data-table="'.$table.'" data-id="'.$row['id'].'" onClick="$_smartDelete(this)">Delete</a></td>
					<td>'.$sn.'</td>
					<td>'.ucwords($row['fullname']).'</td>
					<td>'.$row['email'].'</td>
					<td>'.ucwords($row['country']).'</td>
					<td class="wrap-this">'.$row['message'].'</td>
					<td>'.t_eta($row['eta']).'</td>
				</tr>';
				$sn++;
			 }
			 $caption = 'Showing rows 0 - '.($sn-2).' (~'.($sn-1).', Query took 0.00'.date('s').' sec)';
		}
		else {$caption = "No records found";}
		$CONN->close();	
	?>      
	<!--<caption>Showing rows 0 - 9 (~10, Query took 0.0015 sec)</caption>-->
	<caption><?php echo $caption; ?></caption>    
    <tr>
    	<th>&nbsp;</th>    
        <th>S/N</th>
        <th>Full Name</th>
        <th>Email Address</th>        
        <th>Country</th>
        <th>Message</th>
        <th>Date</th>
    </tr>
    <?php echo $output;	?>
    </table>
    <p></p>      
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
