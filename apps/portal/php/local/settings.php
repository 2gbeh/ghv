<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$table = 'register';
	$_POST = PYF_VAL_TRIM($_POST);		
	if (isset($_POST['update-profile'])) 
	{
		array_pop($_POST);
		$records = PYF_CRUD_SET($_POST);
		$sql = "UPDATE ".$table." SET ".$records." WHERE id=".$USER->id;		
		if ($CONN->query($sql) === TRUE) {$err = "Profile details updated successfully. <a href=''>Reload Page</a>";}
		else {$err = "!Error updating record: ".$CONN->error;}
	}
	if (isset($_POST['update-bank'])) 
	{
		array_pop($_POST);
		$records = PYF_CRUD_SET($_POST);
		$sql = "UPDATE ".$table." SET ".$records." WHERE id=".$USER->id;		
		if ($CONN->query($sql) === TRUE) {$err = "Bank details updated successfully. <a href=''>Reload Page</a>";}
		else {$err = "!Error updating record: ".$CONN->error;}
	}
	if (isset($_POST['update-password'])) 
	{
		array_pop($_POST);
		if ($_POST['current'] == $_POST['new'])		
			$err = "!Former password and New password cannot be the same. <a href='#change'>Try again</a>";				
		else if ($_POST['current'] != $USER->password)
			$err = "!Your current password is incorrect. <a href='#change'>Try again</a>";
		else 
		{
			$sql = "UPDATE ".$table." SET password='".$_POST['new']."' WHERE id=".$USER->id;
			if ($CONN->query($sql) === TRUE) {$err = "Password changed successfully. <a href=''>Reload Page</a>";}
			else {$err = "!Error updating record: ".$CONN->error;}
		}			
	}		
}
?>