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
		$noviewport = true;
		include_once("../../lib/model/meta.php");
		include_once("plugins/PyramidFOX/css/@lib(css).php");
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php");
	?>
	<title>Ledger Records | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="ledger">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Ledger Records</div>
    <div class="wrap overflow">
	<?php echo PYF_DISPLAY_ERROR($err); ?>  
   <form class="tmp-form" <?php echo PYF_FORM_GET(); ?>>    
        <input type="search" name="search" value="<?php echo $_GET['search']; ?>" placeholder="Search Username and press Enter key" required />
        <input style="display:none;" type="submit" />
    </form>               
    <table class="tmp-table">
    <?php
		$table = "debit";
		$limit = 100;
		if (isset($_GET['search'])) {$sort = "WHERE username='".$_GET['search']."'";}
		else
		{
			if (isset($_GET['pager'])) {$sort = PYF_TABLE_PAGER('acct',$limit);}
			else {$sort = "ORDER BY id LIMIT ".$limit;}
		}
		$sql = "SELECT * FROM ".$table." ".$sort;
		//ORDER BY id DESC
		$result = $CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$output = "";
			$sn = 1;
			 while($row = $result->fetch_assoc()) 
			 { 
				 $output .= '<tr>
					<td style="width:10px;">
						<a class="btn btn-pri" data-table="'.$table.'" href="ledger_edit.php?edit='.$row['id'].'">Edit</a> 
						<a class="btn btn-sec" data-table="'.$table.'" data-id="'.$row['id'].'" onClick="$_smartDelete(this)">Delete</a>
					</td>					
					<td>'.$sn.'</td>
					<td>'.$row['username'].'</td>
					<td><b>N'.toMoney($row['amount']).'</b></td> 
					<td>N'.toMoney($row['debit']).'</td>						
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
        <th>Username</th>
        <th>Credit</th>
        <th>Debit</th>        
        <th>Date</th>        
    </tr>
    <?php echo $output;	?>
    </table>
	<?php include_once("inc/local/pager.php"); ?>	  
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
