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
	<title>Stage Tracker | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="matrix">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Stage Tracker</div>
	<div class="wrap overflow">
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>         
		<label>Compensation Plan :</label>
        <select name="complan" required>
        	<option></option>
        	<option value="A">COMPLAN A</option>
        	<option value="B">COMPLAN B</option>
        </select>
		<label>Select Stage :</label>
        <select name="stage" required>
        	<option></option>
            <option>Feeder Stage</option>
            <option>Stage 1</option>
            <option>Stage 2</option>
            <option>Stage 3</option>
            <option>Stage 4</option>
            <option>Stage 5</option>
            <option>Stage 6</option>
            <option>Infinity Stage</option>
        </select>        
		<div class="fgroup">
            <input type="submit" value="Track" />
        </div>     
    </form>    
     <table class="tmp-table">
    <?php
		$table = "tracker";
		$limit = 100;
		if (isset($_GET['pager'])) {$sort = PYF_TABLE_PAGER('track',$limit);}
		else {$sort = "ORDER BY id LIMIT ".$limit;}
		$sql = "SELECT * FROM ".$table." WHERE complan='".$_POST['complan']."' AND stage='".$_POST['stage']."' ".$sort;
		//ORDER BY id DESC
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
					<td>'.$row['complan'].'</td>
					<td>'.$row['stage'].'</td>
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
        <th>S/N</th>
        <th>Username</th>
        <th>COMPLAN</th>
        <th>Stage</th>
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
