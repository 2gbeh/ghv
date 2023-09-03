<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	if ($DEBIT->pending == false)
	{
		$_POST = PYF_VAL_TRIM($_POST);
		$entry = $_POST['debit'];
		$rate = getEnums('forex');
		$mean = getEnums('ledger');		
		$naira = $entry * $rate;
		if ($entry < $mean)
			$err = "!The minimum withdrawal amount is $".$mean;
		else 
		{
			if ($naira <= $WALLET->balance)
			{
				$table = 'debit';
				$_POST['debit'] = $naira;
				$set = PYF_CRUD_SET($_POST);
				$sql = "UPDATE ".$table." SET ".$set." WHERE username='".$USER->username."'";
				if ($CONN->query($sql) === TRUE) {$err = "Request Sent.";}
				else {$err = "!Error sending request. Please try again later.";}
			}
			else {$err = "!Insufficient Balance.";}
		}
	}
	else {$err = "!You already have a pending request. Try again after pending request has been confirmed.";}
}
?>