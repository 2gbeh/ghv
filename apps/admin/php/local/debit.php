<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if (isset($_GET['confirm'])) 
	{
		// get id
		$utm = $_GET['confirm'];
		$table = 'debit';
		$object = PYF_CRUD_BYID($table,$utm);
		$_POST['amount'] = $object->amount - $object->debit;
		$_POST['debit'] = 0;
		$_POST['status'] = 0;
		$set = PYF_CRUD_SET($_POST);
		$sql = "UPDATE ".$table." SET ".$set." WHERE id='".$utm."'";
		if ($CONN->query($sql) === TRUE) {$err = "Request confirmed successfully.";}
		else {$err = "!Error updating records. Please try again later.";}
	}		
	if (isset($_GET['decline'])) 
	{
		// get id
		$utm = $_GET['decline'];
		$table = 'debit';
		$_POST['debit'] = 0;
		$_POST['status'] = 0;
		$set = PYF_CRUD_SET($_POST);
		$sql = "UPDATE ".$table." SET ".$set." WHERE id='".$utm."'";
		if ($CONN->query($sql) === TRUE) {$err = "Request declined successfully.";}
		else {$err = "!Error updating records. Please try again later.";}
	}			
}
?>