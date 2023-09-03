<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	$table = "register";
	$exist = PYF_CRUD_OXIST($table,'email',$_POST['email']);
	if ($exist < 1) $err = "!Email Address not registered.";
	else
	{
		$from = $INI->webmail;
		$to = $_POST['email'];
		$subject = 'Retrieve Password';
		$message = $exist->password;
		$server = $INI->mailer;
		if (smartMail($from,$to,$subject,$message,$server))
			redir("login.php?err=Your password has been sent to your Email Address. Log in to access Dashboard");
		else
			$err = "!Mail delivery failed. Message cound not be delivered to one or more of its recipients.";
	}
}
?>