<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$_POST = PYF_VAL_TRIM($_POST);	
	$history = lenGenx('matrix',$USER->username);
#	var_dump($history);	
	if (in_array($_POST['username'],$history)) 
	{
		$table = "register";
		$THIS_USER = PYF_CRUD_OXIST($table,'username',$_POST['username']);
		$THIS_COMPLAN = complan($THIS_USER); 
		$THIS_SPONSOR = sponsor($table,$THIS_USER->sponsor);
		$THIS_UPLINER = upliner($THIS_USER);		
		$THIS_MATRIX = getMatrix($table,$THIS_USER);
	}
	else {$err = "!This Username is not registered as one of your Downliners.";}
}
?>