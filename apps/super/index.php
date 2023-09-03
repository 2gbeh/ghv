<?php
include_once("config/@config.php");
include_once("lib/PHP/@lib-PHP.php");
include_once("php/server/Server-Signin.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'Sign in'; 
include_once("lib/CSS/@lib-CSS.php");
include_once("lib/JS/@lib-JS.php");
include_once("inc/Meta.php"); 
?>
<link type="text/css" href="css/local/Style-Signin.css" rel="stylesheet" /> 
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="signin">
<main>
<form <?php echo SAP_FORM_POST(); ?>>
<?php echo SAP_DISPLAY_ERROR($err); ?>
<legend>
	<img src="img/Logo.png" border="0" alt="" /> 
	<?php echo $MANIFEST->typeface; ?>
</legend>
<table border="0">
<tr>
	<td><label>Username :</label></td>
	<td>
	    <input 
        type="search" 
        name="username" 
        id="username"
        value="<?php echo $_POST['username'] ?>" 
        placeholder="Enter Username" 
        onBlur="$_backdoor(this.value,'<?php echo $backdoor; ?>')" 
        required autofocus />
    </td>
</tr>
<tr>
	<td><label>Password :</label></td>
	<td>
    	<input 
        type="password" 
        name="password" 
        id="password" 
        value="<?php echo $_POST['password'] ?>" 
        placeholder="Enter Password" 
        onDblClick="$_togglePassword()" 
        required />
	</td>        
</tr>  
<tr>
	<td>&nbsp;</td>    
	<td><input type="submit" value="Sign in" /></td>        
</tr>        
</table>
</form>
</main>
<?php include_once("inc/Footer.php"); ?>
</body>
</html>

