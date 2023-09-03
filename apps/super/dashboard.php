<?php
include_once("config/@config.php");
include_once("lib/PHP/@lib-PHP.php");
include_once("php/logic/Controller.php");
include_once("php/logic/Methods.php");
include_once("php/server/Server-Dashboard.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = 'Dashboard'; 
include_once("lib/CSS/@lib-CSS.php");
include_once("lib/JS/@lib-JS.php");
include_once("inc/Meta.php"); 
?>
<link type="text/css" href="css/local/Style-Dashboard.css" rel="stylesheet" /> 
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="dashboard">
<?php include_once("inc/Header.php"); ?>
<main>
<?php 
echo SAP_DISPLAY_ERROR($err);	
echo getList(setList($SCHEMA),$NAV);
echo getMeter($MANIFEST->dates['Renewal']);
?>
</main>
<?php include_once("inc/Footer.php"); ?>
</body>
</html>

