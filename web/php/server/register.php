<?PHP
$sandbox_reg = false;
if ($sandbox_reg == true)
{
	$_POST = array
	(
		'sponsor'=>'cisco',
		'dob'=>'1992/09/15',
		'username'=>'2gbeh',
		'password'=>'4444',		
		'pin'=>'B1234567'
	);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' || $sandbox_reg == true)
{
#	return $err = "#NOTICE: PORTAL CURRENTLY UNDER MAINTENANCE. PLEASE BARE WITH US.";
	$_POST = PYF_VAL_TRIM($_POST);	
	if (!val_sponsor()) 
		$err .= "Sponsor ID not found in system.<br/>";		
	if (!val_ivcap())
		$err .= "Maximum invite per Sponsor exceeded for this Stage.<br/>";
	if (!val_age()) 
		$err .= "Individual's under age 18 cannot participate in this System.<br/>";
	if (!val_self()) 
		$err .= "Sponsor ID and your Username cannot be the same.<br/>";		
	if (!val_complan()) 
		$err .= "Your Sponsor is not in the same COMPLAN as you.<br/>";		
	if (!val_pin()) 
		$err .= "Invalid Transaction Pin.<br/>";
		
	
	if ($err) {$err = '!'.$err;}
	else
	{
		$table = "register";		
		$fields = PYF_CRUD_FIELDS($_POST);
		$records = PYF_CRUD_VALUES($_POST);
		$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$records.")";	
		if ($CONN->query($sql) === TRUE)
		{
			$err = "Account created successfully.";		
			// update matrix
			$getGenx = getGenx('register',$_POST['username']);
			$setGenx = setGenx('matrix',$getGenx);

			//send welcome email
			$from = $INI->webmail;
			$to = $_POST['email'];
			$subject = 'Welcome to '.$INI->typeface;
			$message = 'GHV...For HELP!!! Hunger Eradication and Lasting Prosperity.';
			$server = $INI->mailer;
			smartMail($from,$to,$subject,$message,$server);
			redir("login.php?err=Registration Complete. Login to Dashboard");
		}
		else {$err = "!Username already registered.";}
		$CONN->close();	
	}
}

?>
