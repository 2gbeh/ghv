<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");
	include_once("php/shared/appstate.php");
	include_once("php/local/ledger.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		#$noviewport = true;
		include_once("../../lib/model/meta.php");
		include_once("plugins/PyramidFOX/css/@lib(css).php");
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php");
	?>
	<title>Edit Ledger | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="ledger">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Edit Ledger</div>
	<div class="wrap">
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>
        <label>Username :</label>    
        <input type="text" name="username" value="<?php echo $_POST['username']; ?>" readonly required />
        <label>Account Balance :</label>    
        <input type="text" name="amount" value="<?php echo $_POST['amount']; ?>" required />
        <label>Withdrawal Request :</label>
        <input type="text" name="debit" value="<?php echo $_POST['debit']; ?>" readonly required />
		<div class="fgroup">
            <input type="submit" value="Update Ledger" />
        </div>     
    </form>    
    </div>
</div>


<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
