<?PHP
class Database
{
	private $SCHEMA, $CONN, $DB, $PRIKEY, $DATE;	
	function __construct ()
	{
		$this->SCHEMA = $GLOBALS['SCHEMA'];
		$this->CONN = $GLOBALS['CONNECTION'];	
		$this->DB = $this->SCHEMA->database;
		$this->PRIKEY = $this->SCHEMA->prikey;			
		$this->DATE = $this->SCHEMA->timestamp;
	}
	function Tables ()
	{
		$sql = "SHOW TABLES FROM ".$this->DB;
		$result = $this->CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
				$array[] = current($row);
		}
		return $array;
	}
	function Schema ($table)
	{		
		$tableArray = $this->Tables();
		foreach ($tableArray as $each)
		{
			$sql = "SELECT COLUMN_NAME,COLUMN_TYPE FROM INFORMATION_SCHEMA.COLUMNS 
			WHERE TABLE_SCHEMA='".$this->DB."' AND TABLE_NAME='".$each."'";
			$result = $this->CONN->query($sql);
			if ($result->num_rows > 0) 
			{
				while($row = $result->fetch_assoc()) 
					$array[$each][] = current($row).' '.strtoupper(end($row));
			}
		}
		if ($table) {return $array[$table];}
		return $array;
	}
	function Meta ($table)
	{
		$sql = "SELECT * FROM ".$table;
		$result = $this->CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$today = date("Y-m-d");
			$counter = 0;
			$object->total = $result->num_rows;
			while($row = $result->fetch_assoc()) 
			{
				$eta = explode(" ",$row[$this->DATE]);
				$date = $eta[0];
				$time = $eta[1];
				if ($date == $today) {$counter++;}
				$array[] = $row;
			}
			$object->today = $counter;
			$object->first_row = current($array);
			$object->last_row = end($array);
			$object->first_id = $object->first_row[$this->PRIKEY];
			$object->last_id = $object->last_row[$this->PRIKEY];
			$object->next_id = $object->last_id + 1;			
			return $object;
		}
		else {return 0;}
	}	
	function Display ($table, $id)
	{		
		if (is_numeric($id) && $id > 0)
		{
			$sql = "SELECT * FROM ".$table." WHERE ".$this->PRIKEY."='".$id."'";
			$result = $this->CONN->query($sql);
			if ($result->num_rows > 0) {return $result->fetch_object();}			
		}
		else
		{
			$sql = "SELECT * FROM ".$table;
			$result = $this->CONN->query($sql);
			if ($result->num_rows > 0)
			{ 
				while($row = $result->fetch_assoc())
					$array[] = $row;
			}
			return $array;
		}
	}
	
}
$DATABASE = new Database();
?>
