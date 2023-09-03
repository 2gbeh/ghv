<?PHP
function val_sponsor ()
{
	$table = "register";	
	return PYF_CRUD_EXIST($table,'username',$_POST['sponsor']);
}
function val_ivcap ()
{
	$table = "register";
	$array = PYF_CRUD_SELECT($table,'sponsor',$_POST['sponsor']);
	if (count($array) < ivcap($_POST['pin'])) return 1;
}
function val_age ()
{
	$map = smartDate($_POST['dob']);
	$array = explode(', ',$map);
	if (date('Y') - $array[1] >= 18) return 1;
}
function val_self ()
{
	if ($_POST['sponsor'] != $_POST['username']) return 1;
}
function val_complan ()
{
	$table = "register";	
	$object = PYF_CRUD_OXIST($table,'username',$_POST['sponsor']);
	if (toComplan($_POST['pin']) == toComplan($object->pin)) return 1;
	
}
function val_pin ()
{
	$table = "pin";
	$farr = array('username','pin');
	$rarr = array($_POST['username'],$_POST['pin']);
	return PYF_CRUD_EXIST($table,$farr,$rarr);	
}
?>
