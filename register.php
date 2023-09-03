<?php
include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
include_once("config/manifest.php"); 	
include_once("config/connection.php"); 		
include_once("lib/model/logic.php"); 			
include_once("web/php/server/validate.php");
$sandbox_test = false; 
if ($sandbox_test == true) {include_once("test/unit/test-server-register.php");}
else {include_once("web/php/server/register.php");}			

?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>Create an Account | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/shared/form-shared.css" rel="stylesheet" />       
    <link type="text/css" href="web/css/local/form-local.css" rel="stylesheet" />    
    <link type="text/css" href="plugins/PyramidFOX/css/Error.css" rel="stylesheet" />    
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />
</head>
<body class="register" onLoad="$autofill('main')">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main class="container">
	<div class="heading">
    	<h2>Welcome to the world of unlimited success</h2>
	    <b>Kindly ensure that you work with your team leader and state rep for a faster growth.</b>
	</div>
    <form class="main" <?php echo PYF_FORM_POST(); ?> id="main">
    <fieldset>
        <legend><h1>Register</h1></legend>
		<?php echo PYF_DISPLAY_ERROR($err); ?>  
        <?php 
			if ($sandbox_test == true) {include_once("test/unit/test-register.php");}
			else {include_once("web/php/local/register.php");}			
		?>
		<div class="button">
            <input type="reset" value="Cancel" />
            <input type="submit" value="Register" />            
        </div>
        Already have an Account? <a href="login.php">Log in</a>
        <p></p>        
    </fieldset>
    </form>    
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
