<?PHP
// Ternary Operator $hint === "" ? "no suggestion" : $hint;
function dump ($args) {var_dump($args);}
function localhost () {if ($_SERVER['SERVER_NAME'] == 'localhost')	return 1;}


function transEnum ($array, $key) {return $array[$key];}
function transDate ($timestamp) 
{
	$array = explode(" ",$timestamp);
	$strtotime = strtotime($array[0]);
	$date = date("D, M j, Y",$strtotime);
	$strtotime = strtotime($array[1]);
	$time = date("h:i A",$strtotime);	
	return $date.' '.$time;
}


function getFormat ($dir) {return '.'.array_pop(explode('.',$dir));}
function getFile ()
{
	$url = $_SERVER['PHP_SELF'];
	$request = array_pop(explode('/',$url));
	$file = explode('?',$request);
	return $file[0];
}
function getPage ()
{
	$file = explode('.',getFile());
	return current($file);
}




?>

