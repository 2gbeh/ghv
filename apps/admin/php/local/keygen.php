<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if (isset($_GET['keygen'])) 
	{
		// get id
		$utm = $_GET['keygen'];		
		// get row
		$obj = PYF_CRUD_BYID('payment',$utm);
		$email = $obj->email;		
		$username = $obj->username;
		// keygen
		$pin = $obj->complan.keygen(7);
		// store pin
		$table = 'pin';
		$post = array('username'=>$username,'pin'=>$pin);
		$where = array('username',$username);
		if (PYF_CRUD_UNIQUE($table,$post,$where)) 
		{
			$from = $INI->webmail;
			$to = $email;
			$subject = 'Transaction Pin';
			$message = $pin;
			$server = $INI->mailer;
			if (smartMail($from,$to,$subject,$message,$server))
				$err = "Transaction Pin has been generated and sent to ".$username."'s Email Address.";
			else
				$err = "!Mail delivery failed. Message cound not be delivered to one or more of its recipients.";
		}
		else {$err = "!Transaction Pin Error. Please try again later.";}
	}		
}
?>