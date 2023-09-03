<?PHP
class Annotation
{
	function __construct ()
	{
		$this->text = 		'';
		$this->blob = 		array("file","image","photo");
		$this->select = 	array("access","gender","state","location","bank","domain","groups","mode");
		$this->textarea = 	array("address","message","project");
		$this->email = 		array("email");
		$this->password = 	array("password","pin");
		$this->timestamp = 	array("date","eta");
		$this->search = 	array("username");
		$this->url = 		array("website","link");
		$this->hidden = 	array("id");
	}
}
$ANNOTATION = new Annotation();
?>