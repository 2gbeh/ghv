<?php
include_once("config/@config.php");
include_once("lib/PHP/@lib-PHP.php");
include_once("php/logic/Controller.php");
include_once("php/logic/Methods.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$meta_page = '@test'; 
include_once("lib/CSS/@lib-CSS.php");
include_once("lib/JS/@lib-JS.php");
include_once("inc/Meta.php"); 
?>
</head>
<body>
<?php include_once("inc/Heade.php"); ?>
<p></p>
<main>
<?php 
$BEAN = new DataAccessObject('dve_users');
$cell = '2018/12/29/6/362';
var_dump
(
substr($cell,0,4),
substr($cell,5,2),
substr($cell,8,2),
$BEAN->SIZE
);
?>
</main>
<?php include_once("inc/Footer.php"); ?>
</body>
</html>

