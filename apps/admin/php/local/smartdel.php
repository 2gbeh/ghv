<?PHP
if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
	if (isset($_GET['table']) && isset($_GET['id']))
	{
		if (PYF_CRUD_DELID($_GET['table'],$_GET['id']))		
			$err = "Record deleted successfully.";
		else
			$err = "!Unable to delete record.";
	}
}
?>