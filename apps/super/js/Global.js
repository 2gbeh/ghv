// JavaScript Document
function $_backdoor ($this, $args)
{
	$array = $args.split("/"); 
	if ($this == $array[0])
	{
		document.getElementById('username').value = $array[1];
		document.getElementById('password').value = $array[2];	
	}
}