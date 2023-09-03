// JavaScript Document
function $_toggle ($args)
{
	var $status, $target = document.getElementById($args);
	if (!$target.style.display || $target.style.display == "none")
		$status = "block";
	else 
		$status = "none";
	$target.style.display = $status;
}