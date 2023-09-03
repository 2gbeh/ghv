<?PHP
$table = "news";
$base = "web/uploads/";

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{	
	$_POST = PYF_VAL_TRIM($_POST);
	$image = $_POST['image'] = $_FILES['image']['name'];	
	$headline = $_POST['headline'];
	$article = $_POST['article'];


	$fields = PYF_CRUD_FIELDS($_POST);
	$records = PYF_CRUD_VALUES($_POST);
	$sql = "INSERT INTO ".$table." (".$fields.") VALUES (".$records.")";	
	if ($CONN->query($sql) === TRUE) 
	{
		$upload = PYF_FILE_UPLOAD($base,$_POST['image']);
		$err = "Article published successfully. <a href='news_table.php'>View Records</a>";
	}
	else 
	{
		$err = "!ERROR: Article not published, try again later.";
	}	
	#var_dump($_FILES,$_POST,$upload);
}

if (isset($_GET['table']) && isset($_GET['id']))
{
	$row = PYF_CRUD_SELECT($table,'id',$_GET['id']);
	$delete = PYF_FILE_DELETE($base,$row[0]['image']);
	#var_dump($row,$delete);
}
?>