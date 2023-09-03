<?PHP
function PYF_FILE_SITE ()
{
	if ($_SERVER['SERVER_NAME'] == 'localhost') 
	{
		$arr = explode('/',$_SERVER['PHP_SELF']); 
		$string = '/'.$arr[1].'/';
	}
	else {$string = '/';}
	return $string;
}
function PYF_FILE_OBJECT ($args) 
{
	$array = current($args);
	$obj['name'] = $array['name'];	
	$obj['tmp_name'] = $array['tmp_name'];	
	$obj['type'] = $array['type'];
	$obj['tmp_type'] = '.'.array_pop(explode('.',$array['name']));
	$obj['size'] = $array['size'];
	$obj['tmp_size'] = round($array['size']/1024,1);
	$obj['error'] = $array['error'];		
	return (object)$obj;
}
function PYF_FILE_UPLOAD ($base, $filename) 
{
	$root = $_SERVER['DOCUMENT_ROOT'].PYF_FILE_SITE();
	$fileArray = current($_FILES);
	if (!$filename) {$filename = $fileArray['name'];}
	$target = $root.$base.$filename;
	#return $fileArray["tmp_name"].'...'.$target;
	if (move_uploaded_file($fileArray["tmp_name"],$target)) return 1;
}
function PYF_FILE_DELETE ($base, $filename) 
{
	$root = $_SERVER['DOCUMENT_ROOT'].PYF_FILE_SITE();
	if (!$filename) {$fileArr = current($_FILES); $filename = $fileArr['name'];}
	$target = $root.$base.$filename;
	if (unlink($target)) return 1;
}

?>



