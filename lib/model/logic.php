<?PHP
if (strpos($_SERVER['PHP_SELF'],'apps/')) 
{
	$subdir = '../../lib/model/';
	include_once($subdir.'controller.php');
	include_once($subdir.'methods.php');
	include_once($subdir.'objects.php');
	include_once($subdir.'rel.php');
	include_once($subdir.'fintech.php');	
	include_once($subdir.'genex.php');
	include_once($subdir.'stage.php');
	include_once($subdir.'matrix.php');	
	
}
else
{
	include_once('controller.php');
	include_once('methods.php');
	include_once('objects.php');
	include_once('rel.php');
	include_once('fintech.php');
	include_once('genex.php');
	include_once('stage.php');
	include_once('matrix.php');	
}





?>