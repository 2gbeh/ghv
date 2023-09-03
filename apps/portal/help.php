<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");	
	include_once("php/local/help.php");		
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
	<title>Customer Help Desk | <?php echo $INI->typeface; ?></title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />       
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="help">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
	<div class="caption">Help Desk</div>
    <div class="wrap">
    <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>
	<?php echo PYF_DISPLAY_ERROR($err); ?>    
    <label for="subject">Subject :</label>
    <input type="hidden" name="username" value="<?php echo $USER->username; ?>" />    
    <input type="text" name="subject" id="subject" value="<?php echo $_POST['subject']; ?>" placeholder="Enter Subject" required />
    
    <label for="message">Message :</label>
    <textarea name="message" id="message" onFocus="$_reset('message')" required><?php echo $_POST['message']; ?>...</textarea>

    <div class="fgroup">
        <input type="submit" value="Send" />
    </div>
    </form>        
    </div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
