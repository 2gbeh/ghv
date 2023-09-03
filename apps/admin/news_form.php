<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");			
	include_once("php/shared/appstate.php");
	include_once("php/local/server_news.php");
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
	<title><?php echo $INI->abbr." News "; ?> | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/local/style_news.css" rel="stylesheet" />    
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="matrix">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Publish News</div>  
	<div class="wrap">      
   <form class="tmp-form" <?php echo PYF_FORM_FILE(); ?>>    
        <?php echo PYF_DISPLAY_ERROR($err); ?>         
		<?php include_once("inc/local/menu_news.php"); ?>        
        <label>Upload Image :</label>    
        <input type="file" name="image" value="<?php echo $_POST['image']; ?>" placeholder="Upload Image" />
        <label>Enter Headline :</label>    
        <input type="text" name="headline" value="<?php echo $_POST['headline']; ?>" placeholder="News Headline" required />
        <label>Enter Article :</label>    
        <textarea name="article" placeholder="News Article" rows="20" required><?php echo $_POST['article']; ?></textarea>
		<div class="fgroup">
            <input type="reset" value="Cancel" />
            <input type="submit" value="Post" />
        </div> 
    </form>    
    </div>
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
