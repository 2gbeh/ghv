<?PHP
function SAP_CTRL_REDIR ($dir) 
{
	echo '<script type="text/javascript">location.assign("'.$dir.'");</script>';
}
function SAP_CTRL_LOGSTATE ($appstate, $directory) 
{
	if ($_REQUEST['logout'] == true || !isset($_SESSION[$appstate]))
	{
		session_unset(); 
		session_destroy(); 
		SAP_CTRL_REDIR($directory);	
	}
}
function SAP_CTRL_APPSTATE ($table, $id)
{
	$schema = $GLOBALS['SCHEMA'];	
	$DataAccessObject = new DataAccessObject($table);
	$where = array($schema->PK,$id);
	return $DataAccessObject->Read($where);
}

?>
