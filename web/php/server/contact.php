<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	$table = "contact";	
	$fields = PYF_CRUD_FIELDS($_POST);
	$records = PYF_CRUD_VALUES($_POST);
	$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$records.")";
	if ($CONN->query($sql) === TRUE) {$err = "Thank you for contacting us.";}
	else {$err = "!Error sending message. Please try again later.";}
	$CONN->close();	
}
?>