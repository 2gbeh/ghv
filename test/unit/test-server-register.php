<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	if (!val_sponsor()) 
		$err .= "Sponsor ID not found in system.<br/>";		
	if (!val_ivcap())
		$err .= "Maximum invite per Sponsor exceeded for this Stage.<br/>";		
	if (!val_self()) 
		$err .= "Sponsor ID and your Username cannot be the same.<br/>";		
	if (!val_complan()) 
		$err .= "Your Sponsor is not in the same COMPLAN as you.<br/>";		
	
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
			// redir
			$_SESSION['user'] = PYF_CRUD_EXIST($table,'username',$_POST['username']); 
			redir("apps/portal/network.php");
		}
		else {$err = "!Username already registered.";}
		$CONN->close();	
	}
}

?>
