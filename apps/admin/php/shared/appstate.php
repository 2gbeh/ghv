<?PHP
$landing = "index.php";
logstate($landing);
if (!appstate('admin')) {logout($landing,"?err=@Log in to access Admin Portal.");}
else
{
	// account
	$ADMIN = account("admin",$_SESSION['admin']);
	if (!$ADMIN) {logout($landing,"?err=@Session closed. Log in to access Admin Portal.");}
	// widget
	$array_tb = array('payment','register','debit','help','contact','subscribe');
	$WIDGET = widget($array_tb);
}
?>