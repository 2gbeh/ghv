<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
	include_once("config/connection.php"); 		
	include_once("web/php/server/retrieve.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>Retrieve Password | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/shared/form-shared.css" rel="stylesheet" />       
    <link type="text/css" href="web/css/local/form-local.css" rel="stylesheet" />    
    <link type="text/css" href="plugins/PyramidFOX/css/Error.css" rel="stylesheet" />    
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />
</head>
<body class="login">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main class="container">
    <form class="main" <?php echo PYF_FORM_POST(); ?>>
    <fieldset>
        <legend><h1>Retrieve Password</h1></legend>                        
		<?php echo PYF_DISPLAY_ERROR($err); ?>
		<label>Email Address :</label>
        <input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Enter your Email Address" required />		
                
		<div class="button">
            <input type="submit" value="Retrieve" />        
        </div>
        Don't have an Account? <a href="register.php">Register</a>
        <p></p>
    </fieldset>
    </form>    
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
