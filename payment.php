<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
	include_once("config/connection.php"); 		
	include_once("web/php/server/payment.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>Payment Portal | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/shared/form-shared.css" rel="stylesheet" />       
    <link type="text/css" href="web/css/local/form-local.css" rel="stylesheet" />    
    <link type="text/css" href="plugins/PyramidFOX/css/Error.css" rel="stylesheet" />        
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />
</head>
<body class="register">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main class="container">
	<div class="heading">
        <b style="color:#EE1111;">NOTE: This form is meant for payment directly to the company for transaction pin.</b>
    </div>
	<form class="main" <?php echo PYF_FORM_POST(); ?>>
    <fieldset>
        <legend><h1>Payment Portal</h1></legend>    
		<?php echo PYF_DISPLAY_ERROR($err); ?>        
		<label>Email Address :</label>
        <input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Enter your Email Address" required />		
                
		<label>Username :</label>
        <input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter your Username" required />		
                
		<label>Compensation Plan :</label>
        <select name="complan" required>
        	<option></option>
        	<option value="A">COMPLAN A ($5 ~ N1,000)</option>
        	<option value="B">COMPLAN B ($20 ~ N4,000)</option>
        </select>
        
        <label for="pos">Method of Payment :</label>
        <input type="text" name="pos" id="pos" value="<?php echo $_POST['pos']; ?>" list="list-pos" placeholder="Enter Method of Payment" required />
        <?php
			$posArray = PYF_ENUM($type);
			echo PYF_FORM_DATALIST('pos',$posArray); 
		?>
        
        <label for="dop">Date of Payment :</label>
        <input type="date" name="dop" id="dop" value="<?php echo PYF_GET_DATE(); ?>" placeholder="Enter Date of Payment" maxlength="10" required />

		<input type="checkbox" required /> I agree to the Terms of Payment which states that <b>Registration Fee is non-refundable</b>!
        
        <div class="button">
            <input type="submit" value="Submit" />
        </div>
	</fieldset>
    </form>        
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
