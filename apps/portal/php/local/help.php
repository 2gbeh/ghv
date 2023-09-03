<?PHP
if (isset($_GET['reward']))
{
	$_POST['subject'] = 'RE: Collect My Reward';
	$_POST['message'] = 'I, '.toTitle($USER->fullname).' ('.$USER->phone.'), kindly submit this request to collect my due reward for COMPLAN '.$COMPLAN->complan.' ('.$COMPLAN->stage.'). Thank you.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	$table = "help";	
	$fields = PYF_CRUD_FIELDS($_POST);
	$records = PYF_CRUD_VALUES($_POST);
	$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$records.")";
	if ($CONN->query($sql) === TRUE) {$err = "Message sent. Our support team will contact you shortly.";}
	else {$err = "!Error sending message. Please try again later.";}
	$CONN->close();	
}
?>