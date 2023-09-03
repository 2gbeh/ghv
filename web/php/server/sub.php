<?PHP
include_once("../../../config/connection.php"); 		
header("Content-Type: application/json; charset=UTF-8"); 
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
//	$email = 'dehphantom@yahoo.com';
	$email = $_POST["email"];
	$table = "subscribe";
	$sql = "INSERT INTO ".$table." (email) VALUES ('".$email."')";
	if ($CONN->query($sql) === TRUE) {echo true;}
	else {echo false;}
	$CONN->close();	
}
?>