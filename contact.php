<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
	include_once("config/connection.php"); 		
	include_once("web/php/server/contact.php"); 
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php");
	?>
	<title>Contact Us | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/shared/form-shared.css" rel="stylesheet" />       
    <link type="text/css" href="web/css/local/form-local.css" rel="stylesheet" />    
    <link type="text/css" href="plugins/PyramidFOX/css/Error.css" rel="stylesheet" />    
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="contact">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<img src="web/media/images/banner_1.jpg" class="banner" alt="" />
<main class="container">
    <form class="main" <?php echo PYF_FORM_POST(); ?>>
    <fieldset>
        <legend><h1>Contact Us</h1></legend>
		<?php echo PYF_DISPLAY_ERROR($err); ?>
		<label for="fullname">Full Name :</label>
        <input type="text" name="fullname" id="fullname" value="" placeholder="Enter your Full Name" required />
		
        <label for="email">Email Address :</label>
        <input type="email" name="email" id="email" value="" placeholder="Enter your Email Address" required />
		
        <label for="country">Country :</label>
        <input type="text" name="country" id="country" value="" placeholder="Enter your Country" required />
		
        <label for="message">Message :</label>
        <textarea name="message" id="message" onFocus="$_reset('message')" required>...</textarea>
	
    	<div class="button">
			<input type="submit" value="Send" />
        </div>
    </fieldset>
    </form>    
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
