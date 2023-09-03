<?PHP
$appstate = 'super';
$nav = "dashboard.php";
$query = "?err=Log in Succesful";
$action = $nav.$query;
$backdoor = 'root()/'.$SCHEMA->username.'/'.$SCHEMA->password;

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$USERNAME = $SCHEMA->username;
	$PASSWORD = $SCHEMA->password;	

	$_POST = SAP_FORM_VAL($_POST);
	if ($_POST["username"] == $USERNAME)
	{
		if ($_POST["password"] == $PASSWORD) 
		{
			$_SESSION[$appstate] = true;
			SAP_CTRL_REDIR($action);
		}
		else {$err = "!Invalid Password";}
	}
	else {$err = "!Invalid Username";}
}
?>

