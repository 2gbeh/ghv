<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");	
	include_once("php/local/debit.php");			
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
	<title>Withdrawal Requests | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="withdraw">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Withdrawal Requests</div>
    <div class="wrap overflow">
	<?php echo PYF_DISPLAY_ERROR($err); ?>     
   <form class="tmp-form" <?php echo PYF_FORM_GET(); ?>>    
        <input type="search" name="search" value="<?php echo $_GET['search']; ?>" placeholder="Search Username and press Enter key" required />
        <input style="display:none;" type="submit" />
    </form>        
    <table class="tmp-table">
    <?php
		$table = "debit";
		if (isset($_GET['search'])) {$sort = "WHERE username='".$_GET['search']."'";}
		else {$sort = "WHERE status=1 ORDER BY id DESC";}
		$sql = "SELECT * FROM ".$table." ".$sort;
		$result = $CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$output = "";
			$sn = 1;
			 while($row = $result->fetch_assoc()) 
			 {
				 $output .= '<tr>
					<td>'.$sn.'</td>							 
					<td>'.$row['username'].'</td>
					<td class="green">N '.toMoney($row['amount']).'</td>
					<td>N '.toMoney($row['debit']).'</td>					
					<td>'.t_eta($row['eta']).'</td>
					<td>
						<a class="btn btn-sec" onClick="$_smartConfirm(\'Confirm Request?\',\'?confirm='.$row['id'].'\')">Confirm</a>
						<a class="btn" onClick="$_smartConfirm(\'Decline Request?\',\'?decline='.$row['id'].'\')">Decline</a>
					</td>												
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
        <th>S/N</th>
        <th>Username</th>
        <th>Avail. Bal.</th>
        <th>Request</th>        
        <th>Date of Request</th>
        <th>&nbsp;</th>        
    </tr>
    <?php echo $output;	?>
    </table>
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
