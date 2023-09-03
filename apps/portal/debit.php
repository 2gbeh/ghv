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
		include_once("../../lib/model/meta.php"); 
		include_once("plugins/PyramidFOX/css/@lib(css).php");		
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php"); 		
	?>
	<title>Withdrawal | <?php echo $INI->typeface; ?></title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />       
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="withdrawal">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
	<div class="caption">Submit Request</div>
    <div class="wrap">
    <ul class="tmp-crumb">
        <li class="th">Ledger Balance:</li>
        <li class="green"><?php echo $WALLET->dollar.' ('.$WALLET->naira.')'; ?></li>
        <li class="th">Pending Request:</li>
        <li class="red"><?php echo $DEBIT->dollar_t.' ('.$DEBIT->amount_t.')'; ?></li>
    </ul>    
   <div style="font-size:12px; padding:5px 10px 0; color:blue;">Conversion Rate ($1 ~ N200)</div>    
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>         
        <label for="debit">Withdrawal Amount (*$):</label>            
        <input type="text" name="debit" value="<?php echo $_POST['debit']; ?>" placeholder="Enter Amount in Dollars" required />        
        <input type="hidden" name="status" value="1" />        
		<div class="fgroup">
            <input type="submit" value="Submit" />
        </div>     
    </form>  
      
    </div>
</div>
<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
