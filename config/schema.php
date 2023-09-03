<?PHP
class Schema
{
	function Schema()
	{
		$this->server = "localhost";
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
		$this->database = "ghelpers_db";		
		$this->table = array 
		(
			"admin",
			"subscribe"
		);
		$this->field = array 
		(
			"email,username,password,access",
			"email"
		);
		$this->desc = array 
		(
			"VARCHAR(50),VARCHAR(25),VARCHAR(25),INT(1)",
			"VARCHAR(50)"
		);
		$this->preset = array 
		(
			"status INT(1) DEFAULT 0,",
			"eta TIMESTAMP DEFAULT CURRENT_TIMESTAMP,",
			"id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY"
		);						
		$this->record = array 
		(
			array
			(
				"dehphantom@yahoo.com,2gbeh,4444,3",
				"akinnayajogab@gmail.com,gabby5,3010,2"
			),
			"dehphantom@yahoo.com"
		);
	}
}
$SCHEMA = new Schema();
?>