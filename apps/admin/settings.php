<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");				
	include_once("php/shared/appstate.php");
	include_once("php/local/settings.php");				
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
	<title>Account Settings | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />       
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="settings">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
	<div class="caption">Account Settings</div>
	<div class="wrap overflow">
    <table class="tmp-tab">
    <tr>
    	<th>Menu :</th>
    	<td><a href="#profile">Profile Details</a></td>
    	<td><a href="#change">Change Password</a></td>                      
	</tr>        
    </table>
	</div>
	<?php echo PYF_DISPLAY_ERROR($err); ?> 
</div>
<?php include_once("inc/local/profile.php"); ?>
<?php include_once("inc/local/password.php"); ?>
<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
