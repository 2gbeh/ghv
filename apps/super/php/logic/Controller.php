<?PHP
// GLOBALS
$conn = $GLOBALS['CONNECTION'];		

// PAGES
$appstate = "super";
$landing = "index.php";
$homepage = "dashboard.php";

// CONSTANTS
define('GLOB1','setTable');

// CONTROLLER
SAP_CTRL_LOGSTATE($appstate,$landing); 
?>
