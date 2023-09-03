<?PHP
$table = "debit";

if (isset($_GET['edit']) && is_numeric($_GET['edit']))
{
	$row = PYF_CRUD_OXIST($table,'id',$_GET['edit']);
	$_POST['username'] = $row->username;
	$_POST['amount'] = $row->amount;	
	$_POST['debit'] = $row->debit;		
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);
	$sql = "UPDATE ".$table." SET amount='".$_POST['amount']."' WHERE username='".$_POST['username']."'";
	if ($CONN->query($sql) === TRUE) {$err = "Ledger updated successfully.";}
	else {$err = "!Error updating records. Please try again later.";}
}
?>