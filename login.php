<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
	include_once("config/connection.php"); 		
	include_once("web/php/server/login.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>Log in | <?php echo $INI->appname; ?></title>
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
        <legend><h1>Log in</h1></legend>                        
		<?php echo PYF_DISPLAY_ERROR($err); ?>                
		<label>Username :</label>
        <input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter your Username" required />		
                
		<label>Password :</label>
        <input type="password" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Enter your Password" id="password" onDblClick="$_togglePassword()" required />

		<input type="checkbox" checked /> Keep me logged in | 
        <a href="retrieve.php">Forgot Password?</a></li>
		<div class="button"><input type="submit" value="Login" /></div>
        Don't have an Account? <a href="register.php">Register</a>
        <p></p>
    </fieldset>
    </form>    
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
