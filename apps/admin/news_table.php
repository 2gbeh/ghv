<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");
	include_once("php/local/server_news.php");
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
	<title><?php echo $INI->abbr." News "; ?> | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/local/style_news.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />
</head>
<body class="enquiry">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">News Records</div>
    <div class="wrap overflow">
	<?php echo PYF_DISPLAY_ERROR($err); ?>         
	<?php include_once("inc/local/menu_news.php"); ?>
    <table class="tmp-table">
    <?php
		$table = "news";
		$sql = "SELECT * FROM ".$table." ORDER BY id ASC LIMIT 25";
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
					<td>'.$row['image'].'</td>
					<td>'.$row['headline'].'</td>
					<td><a href="../../news.php#aid_'.$row['id'].'" target="_blank" style="text-decoration:underline; color:blue;">view post</a></td>
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
        <th>Image</th>
        <th>Headline</th>        
        <th>Article</th>
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
