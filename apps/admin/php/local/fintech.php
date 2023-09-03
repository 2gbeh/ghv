<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	if ($_POST['submit-credit'])
	{
		$_POST = PYF_VAL_TRIM($_POST);
		$member = $_POST['member'];
		$upliner = $_POST['upliner'];
		// check if member and upliner exist
		$table = "register";		
		$row_member = PYF_CRUD_OXIST($table,'username',$member);	
		$row_upliner = PYF_CRUD_OXIST($table,'username',$upliner);
		if (!$row_member)
			$err = "!Member ID not found in records.";
		else if (!$row_upliner)
			$err = "!Upliner ID not found in records.";
		else if (toComplan($row_member) != toComplan($row_upliner))
			$err = "!Both accounts are not in the same COMPLAN.";		
		else
		{
			// update upliner table
			$table = "upliner";	
			PYF_CRUD_UNIQUE($table,$_POST,array('member',$member));
			// get stage earning and update debit table
			$table = "debit";
			credit($table,$row_upliner);
			$err = "Upliner assigned and credited successfully.";	
		}
	}
	
	if ($_POST['submit-bonus'])
	{
		$_POST = PYF_VAL_TRIM($_POST);
		$sponsor = $_POST['sponsor'];
		// check if sponsor exist
		$table = "register";		
		$row_sponsor = PYF_CRUD_OXIST($table,'username',$sponsor);	
		if (!$row_sponsor)
			$err1 = "!Sponsor ID not found in records.";
		else if (toComplan($row_sponsor) != "B")
			$err1 = "!Bonus only meant for members of COMPLAN B.";
		else
		{
			// update debit table
			$table = "debit";			
			bonus($table,$sponsor,$row_sponsor->pin);
			$err1 = "Sponsor Bonus paid successfully.";
		}
	}
	
}


?>