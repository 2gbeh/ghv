<?php 
include_once("plugins/PyramidFOX/php/@lib(php).php");
include_once("../../config/manifest.php");
include_once("../../config/connection.php");
include_once("../../lib/model/logic.php");		
include_once("php/shared/appstate.php");	
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
<title>@Test | Admin</title>
<link type="text/css" href="css/shared/master.css" rel="stylesheet" />
<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body>
<?PHP
dump(widget());

?>
</body>
</html>
