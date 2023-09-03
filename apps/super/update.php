<?php
include_once("config/@config.php");
include_once("lib/PHP/@lib-PHP.php");
include_once("php/logic/Controller.php");
include_once("php/logic/Methods.php");
include_once("php/server/Server-Update.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'Update'; 
include_once("lib/CSS/@lib-CSS.php");
include_once("lib/JS/@lib-JS.php");
include_once("inc/Meta.php"); 
?>
<link type="text/css" href="css/local/Style-Editor.css" rel="stylesheet" /> 
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="editor">
<?php include_once("inc/Header.php"); ?>
<main>
<form <?php echo SAP_FORM_POST(); ?>>
<?php echo SAP_DISPLAY_ERROR($err); ?>
<table border="0">
<?php echo getEditor($DATABASE,$TABLE,$PRIKEY); ?>
</table>
</form>
</main>
<?php include_once("inc/Footer.php"); ?>
</body>
</html>

