<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
#	return $err = "#NOTICE: PORTAL CURRENTLY UNDER MAINTENANCE. PLEASE BARE WITH US.";
	$_POST = PYF_VAL_TRIM($_POST);	
	$table = "register";
	$exist = PYF_CRUD_LOGIN($table,$_POST);
	if ($exist == "#401") $err = "!Username not found.";
	else if ($exist == "#402") $err = "!Incorrect password.";	
	else {$_SESSION['user'] = $exist; redir("apps/portal/index.php");}
}
?>