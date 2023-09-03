<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);
	$table = "payment";
	$exist = PYF_CRUD_EXIST($table,array('username','complan'),array($_POST['username'],$_POST['complan']));
	if ($exist) {$err = "!Payment already recieved for selected COMPLAN.";}
	else
	{
		$fields = PYF_CRUD_FIELDS($_POST);
		$records = PYF_CRUD_VALUES($_POST);
		$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$records.")";	
		if ($CONN->query($sql) === TRUE) {$err = "Form submitted successfully.";}
		else {$err = "!Error submitting form. Please try again later.";}
		$CONN->close();	
	}
}
?>