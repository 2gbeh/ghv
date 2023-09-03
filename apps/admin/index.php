<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");		
	include_once("php/local/login.php");	
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
	<title>Log in | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="login">
<?php include_once("inc/local/header_login.php"); ?>
<div class="container">
    <div class="wrap">
    <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>
    <fieldset>
        <legend><h1>Log in</h1></legend>                        
		<?php echo PYF_DISPLAY_ERROR($err); ?>                
		<label>Username :</label>
        <input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter your Username" required />		
                
		<label>Password :</label>
        <input type="password" name="password" value="<?php echo $_POST['password']; ?>" placeholder="Enter your Password" id="password" onDblClick="$_togglePassword()" required />

		<input type="checkbox" checked /> Keep me logged in | 
        <a href="?err=@Contact service provider to retrieve password.">Forgot Password?</a></li>
		<div class="fgroup"><input type="submit" value="Login" /></div>
        <p></p>
    </fieldset>
    </form>        
    </div>
</div>
</body>
</html>
