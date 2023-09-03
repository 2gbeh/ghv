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
	<title>Dashboard | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="home">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>
	<?php echo renewal('09/11/2019 - 08/11/2020'); ?>
<div class="container">
    <div class="caption">Dashboard <a href="rel.php"><?php echo PYF_GET_ETA('teller');?></a></div>
    <div class="wrap">
    <ul class="tmp-widget">
        <li>
            <h1>Profile Details</h1>
			<div class="profile">&nbsp;</div>
            <h2><?php echo toTitle($ADMIN->username); ?></h2>
            <h3><?php echo $ADMIN->email.'<br/><b>Created: </b>'.t_eta($ADMIN->eta) ?></h3>
        </li>            
        <li>
            <h1>Account Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->register->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->register->total; ?>
            </h3>
        </li>            
        <li>
	        <h1>Payment Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->payment->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->payment->total; ?>
            </h3>
        </li>                  
        <li>
	        <h1>Withdrawal Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->debit->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->debit->total; ?>
            </h3>
        </li>                          
        <li>
            <h1>Help Desk Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->help->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->help->total; ?>
            </h3>
        </li>               
        <li>
            <h1>Enquiry Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->contact->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->contact->total; ?>
            </h3>
        </li>               
        <li>
            <h1>Newsletter Report</h1>
            <h3>
	            <b>Today:</b> <?php echo $WIDGET->subscribe->today; ?>
            	<b>Overall:</b> <?php echo $WIDGET->subscribe->total; ?>
            </h3>
        </li>        
    </ul>
    </div>
</div>
<p></p>
<div class="container">
	<div class="caption">Recent Payments</div>
    <div class="wrap overflow">
    <table class="tmp-report">
    <?php
		$table = "payment";
		$sql = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 10";
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
						<div class="report-subtitle"><a>COMPLAN:</a> '.$row['complan'].'</div> 
					</td>    
				</tr>';
			 }
		}
		else {$output = "<tr><td><a>No Recent Payments</a></td></tr>";}
		$CONN->close();	
		echo $output;		
	?>
    </table>
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
