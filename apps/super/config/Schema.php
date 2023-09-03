<?PHP
class Schema
{
	function __construct ()
	{
		$this->server = 	"localhost";		
		$this->pseudo = 	"ghelpers";		
		if ($_SERVER['SERVER_NAME'] == 'localhost')
		{
			$this->username = "root";
			$this->password = "";
		}
		else
		{
			$this->username = "ghelpers_root";
			$this->password = "_Strongp@ssw0rd";
		}
		$this->database = 	"ghelpers_db";
		$this->pattern = 	"";
		$this->prikey = 	"id";
		$this->timestamp = 	array("eta");		
		$this->auto = 		array("status","eta","id");
		$this->forkey = 	array("username");
		$this->main =	 	"register";	
	}
}
$SCHEMA = new Schema();
?>