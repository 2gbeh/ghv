<?PHP
include_once("schema.php"); 
$server = $SCHEMA->server;
$username = $SCHEMA->username;
$password = $SCHEMA->password;
$database = $SCHEMA->database;

$CONN = new mysqli($server,$username,$password,$database);
if ($CONN->connect_error) die("Connection failed: ".$CONN->connect_error);
?>