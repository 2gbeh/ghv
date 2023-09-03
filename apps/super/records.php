<?php
include_once("config/@config.php");
include_once("lib/PHP/@lib-PHP.php");
include_once("php/logic/Controller.php");
include_once("php/logic/Methods.php");
include_once("php/server/Server-Records.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
$noviewport = true;
$meta_page = 'Records'; 
include_once("lib/CSS/@lib-CSS.php");
include_once("lib/JS/@lib-JS.php");
include_once("inc/Meta.php"); 
?>
<link type="text/css" href="css/local/Style-Records.css" rel="stylesheet" /> 
<link type="text/css" href="css/shared/Viewport.css" rel="stylesheet" /> 
</head>
<body class="records">
<?php include_once("inc/Header.php"); ?>
<main>
<form class="task" <?php echo SAP_FORM_GET(); ?>>
<input type="button" onClick="$_batchDelete('target')" value="Delete Selected" />
<input type="button" onClick="$_goto('?sort=ASC')" value="Sort ASC" />
<input type="button" onClick="$_goto('?sort=DESC')" value="Sort DESC" />
<input type="search" name="search" placeholder="Search by SQL Clause..." value="<?php echo $_GET['search']; ?>" />
</form>
<p></p>
<section>
<form id="target" <?php echo SAP_FORM_POST(); ?>>
<?php 
echo SAP_DISPLAY_ERROR($err);
echo display($TABLE,$PRIKEY,$NAV);
?>
</form>
</section>
<p></p>
<table class="pager" id="pager">
<tr>
<th><a onClick="$_setPager('prev')" title="Previous">&lt; Prev</a></th>
<th><a onClick="$_setPager('next')" title="Next">Next &gt;</a></th>                                        
</tr>
</table>
</main>
<?php include_once("inc/Footer.php"); ?>
</body>
</html>

