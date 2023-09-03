<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");
	include_once("php/local/fintech.php");
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
	<title>Assign Upliner &amp; Pay Bonus | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="matrix">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Assign Upliner</div>
	<div class="wrap">
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>         
        <label>Member Username :</label>    
        <input type="text" name="member" value="<?php echo $_POST['member']; ?>" placeholder="Enter Member ID" required />
        <label>Upliner Username :</label>    
        <input type="text" name="upliner" value="<?php echo $_POST['upliner']; ?>" placeholder="Enter Upliner ID" required />        
		<div class="fgroup">
            <input type="submit" name="submit-credit" value="Assign &amp; Credit" />
        </div>     
    </form>    
    </div>
</div>

<div class="container">
    <div class="caption">Sponsor Bonus</div>
	<div class="wrap">
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err1); ?>
        <label>Sponsor Username :</label>    
        <input type="text" name="sponsor" value="<?php echo $_POST['sponsor']; ?>" placeholder="Enter Sponsor ID" required /> 
		<div class="fgroup">
            <input type="submit" name="submit-bonus" value="Pay Bonus" />
        </div>     
    </form>    
    </div>
</div>


<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
