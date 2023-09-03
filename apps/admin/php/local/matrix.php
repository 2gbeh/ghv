<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	$table = "register";
	$USER = PYF_CRUD_OXIST($table,'username',$_POST['username']);
	if ($USER)
	{
		$COMPLAN = complan($USER);
		$SPONSOR = sponsor($table,$USER->sponsor);
		$UPLINER = upliner($USER);
		$MATRIX = getMatrix($table,$USER);
#		var_dump($USER,$UPLINER);
	}
	else {$err = "!Username not found in records.";}
}
?>