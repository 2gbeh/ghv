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
	<title>Dashboard | <?php echo $INI->typeface; ?></title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="home">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Dashboard <a><?php echo PYF_GET_ETA('teller');?></a></div>
    <div class="wrap">
    <ul class="tmp-widget">
        <li>
            <h1>Profile Details</h1>
			<div class="profile">&nbsp;</div>
            <h2><?php echo toTitle($USER->fullname); ?></h2>
            <h3>
				<?php echo toLower($USER->email); ?> <br/>
                <b>Referral ID:</b> <?php echo $USER->username; ?>
            </h3>
        </li>            
        <li>
            <h1>e-Wallet</h1>
            <h2><?php echo $WALLET->dollar; ?></h2>
            <h3>
				<?php echo $WALLET->naira; ?> <br/>
            	<a class="default" href="debit.php">Request Withdrawal</a>
            </h3>
        </li>          
        <li>
	        <h1>Status Report</h1>
            <h2>COMPLAN <?php echo $COMPLAN->complan; ?></h2>
            <h3>
				<?php  echo $COMPLAN->stage.' ('.$COMPLAN->title.')'; ?> <br/>
				<?php  echo t_eta($TRACKER->eta); ?> <p></p>
                Total Downliners: <b><?php echo $COMPLAN->total; ?></b><br/>
				<a class="default" href="help.php?reward=true.php">Collect My Reward</a>
            </h3>            
        </li>            
        <li>
            <h1>Sponsor Details</h1>
            <h2><?php echo $SPONSOR->username; ?></h2>
            <h3>
                <b>Name:</b> <?php echo toTitle($SPONSOR->fullname); ?> <br/>
                <b>Telephone:</b> <?php echo $SPONSOR->phone; ?> 
            </h3>
        </li>
        <li>
            <h1>Upliner Details</h1>
            <h2><?php echo $UPLINER->username; ?></h2>
            <h3>
                <b>Name:</b> <?php echo toTitle($UPLINER->fullname); ?> <br/>
                <b>Telephone:</b> <?php echo $UPLINER->phone; ?> 
            </h3>
        </li>        
        <li>
            <h1>Joined</h1>
            <h2><?php echo t_time($USER->eta); ?></h2>
            <h3><?php echo t_date($USER->eta); ?></h3>
        </li>                   
    </ul>
    </div>
</div>
<p></p>
<div class="container">
	<div class="caption">Recent Downliners</div>
    <div class="wrap overflow">
    <table class="tmp-report">
    <?php
		$table = "register";	
		$array = $COMPLAN->downliner;
		if (is_array($array) && count($array) > 0)
		{
			krsort($array);
			$output = "";
			$counter = 1;
			foreach ($array as $each)
			{
				if ($counter < 15)
				{
					$row = PYF_CRUD_OXIST($table,'username',$each);
					$row = (array)$row;
					 $output .= '<tr>
						<td>
							<div class="report-title">'.toTitle($row['fullname']).'</div> 
							<div class="report-meta">'.f_date($row['eta']).'</div>
							<div class="report-subtitle">
								<a>Username:</a> '.$row['username'].' ('.$row['phone'].')
							</div> 
						</td>    
					</tr>';
					
				}
				else {break;}
				$counter++;
			}
		}
		else {$output = "<tr><td><a>No Recent Downliners</a></td></tr>";}
		echo $output;		
	?>
    </table>
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
