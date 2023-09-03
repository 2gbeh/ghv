<?PHP
$table = "news";	
$sql = "SELECT * FROM ".$table." LIMIT 25";
$resultSet = $CONN->query($sql);
if ($resultSet->num_rows > 0) 
{
	while ($row = $resultSet->fetch_assoc())
	{
		$row['article'] = PYF_STR_RICHTEXT($CONN,$row['article']);
		$buffer .= "<span id='aid_".$row['id']."'></span>";
		$buffer .= "<h2>".$row['headline']."</h2>";
		$buffer .= "<article>".$row['article']."</article>";
		$buffer .= "<img src='web/uploads/".$row['image']."' class='thumb' alt='' />";
		$buffer .= "<p></p>";
	}
}
$CONN->close();	
?>