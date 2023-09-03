<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");
	include_once("php/local/matrix.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		$noviewport = true;	
		include_once("../../lib/model/meta.php"); 
		include_once("plugins/PyramidFOX/css/@lib(css).php");		
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php"); 			
	?>
	<title>User Matrix Tree | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="matrix">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">User Matrix Tree</div>
	<div class="wrap">
   <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>         
        <label>Username :</label>    
        <input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter Username" list="mylist" required />
        <?php echo getDatalist(); ?>
		<div class="fgroup">
            <input type="submit" value="View" />
        </div>     
    </form>    
    </div>
</div>
<p></p>
<div class="container">
	<div class="wrap overflow">
    <ul class="tmp-crumb">   
    <li>
        <b>Sponsor ID:</b> 
		<?php echo $SPONSOR->username; ?>
        <span class="meta">(<?php echo $SPONSOR->phone; ?>)</span>
    </li>    
    <li>
        <b>Upliner ID:</b> 
		<?php echo $UPLINER->username; ?>
        <span class="meta">(<?php echo $UPLINER->phone; ?>)</span>
    </li>     
    <li>
        <b>COMPLAN:</b> 
		<?php echo $COMPLAN->complan; ?>
    </li>
    <li>
        <b>Stage:</b> 
		<?php echo $COMPLAN->stage; ?>
        <span class="meta">(<?php echo $COMPLAN->title; ?>)</span>
    </li>    
    <li>
        <b>Total:</b> 
        <span class="badge"><?php echo $COMPLAN->total; ?></span>
    </li>        
    </ul>
	<p></p>
    <ul class="tmp-crumb">
    <li class="th">Key :</li>
    <li>
        <div class="pyramid py-small" id="py-close">&nbsp;</div>
        Occupied <b><?php echo $COMPLAN->close; ?></b>
    </li>
    <li>
        <div class="pyramid py-small" id="py-open">&nbsp;</div>
        Available <b><?php echo $COMPLAN->open; ?></b>
    </li>
    <li><b style="color:#EE1111;">*</b> Directs</li>
    </ul>
    <?php
		if ($COMPLAN->complan == "A") 
		{
			if ($COMPLAN->title == 'Builder')
				include_once("inc/local/matrix_a1.php");
			else
				include_once("inc/local/matrix_a.php");
		}
		if ($COMPLAN->complan == "B") 
		{
			if ($COMPLAN->title == 'Feeder')
				include_once("inc/local/matrix_b1.php"); 
			else
				include_once("inc/local/matrix_b.php"); 
		}
	?>
    </div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
