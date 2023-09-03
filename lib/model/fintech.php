<?PHP
function toDollar ($amt) 
{
	$rate = getEnums('forex');
	return round($amt/$rate,2);
}
function wallet ($table, $username)
{
	$conn = $GLOBALS['CONN'];
	$sql = "SELECT amount FROM ".$table." WHERE username='".$username."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0)
	{ 
		while($row = $result->fetch_object()) {$sum = $row->amount;}
	}
	else {$sum = 0;}
	$object->balance = $sum;		
	$object->dollar = "$ ".toMoney(toDollar($sum));	
	$object->naira = "N ".toMoney($sum);
	$object->typeface = $object->dollar.' ~ '.$object->naira;
	return $object;	
}
function debit ($table, $username)
{
	$conn = $GLOBALS['CONN'];	
	$sql = "SELECT * FROM ".$table." WHERE username='".$username."' AND status=1";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		$object = $result->fetch_object();
		$object->pending = true;
		$object->amount_t = 'N '.toMoney($object->debit);		
		$object->dollar = toDollar($object->debit);
		$object->dollar_t = '$ '.toMoney($object->dollar);
	}
	else
	{
		$object->pending = false;
		$object->amount_t = 'N 0';
		$object->dollar = 0;
		$object->dollar_t = '$ 0';				
	}
	return $object;	
}
function credit ($table, $user)
{
	$complan = complan($user);	
	$username = $user->username;
	$row = PYF_CRUD_OXIST($table,'username',$username);
	$credit = $complan->earn + $row->amount;
	$_POST = array("username"=>$username,"amount"=>$credit);
	PYF_CRUD_UNIQUE($table,$_POST,array('username',$username));
}
function bonus ($table, $sponsor, $pin)
{
	if (toComplan($pin) == 'B') 
	{
		// credit sponsor N1,000
		$object = PYF_CRUD_OXIST($table,'username',$sponsor);
		if ($object) {$bal = $object->amount;} else {$bal = 0;}
		$credit = $bal + 1000;
		$POST = array('username'=>$sponsor,'amount'=>$credit);
		PYF_CRUD_UNIQUE($table,$POST,array('username',$sponsor));
	}
}


?>