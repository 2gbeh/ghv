// JavaScript Document
function $_checkAll ($this)
{
	var $set, $status = $this.checked;	
	if ($status == true) {$set = true;}
	else {$set = false;}

	var $class = $this.getAttribute("class");	
	var $checkbox = document.getElementsByClassName($class);	
	for (var i = 0; i < $checkbox.length; i++)
		$checkbox[i].checked = $set;
}
function $_togglePassword ($args)
{
	if (!$args) $args = 'password';
	var $target = document.getElementById($args);
	if ($target.type == 'password') {$target.type = "text";}
	else {$target.type = "password";}
}
function $_keycode ($event, $code, $callback)
{
	var $key = $event.which || $event.keyCode;
	if ($key == $code) $callback();
	else return false;
}
function $_unitDelete ($args)
{
	if (confirm('Delete Record?') == true)
	{
		$_goto("?delete="+$args);
	}
}
function $_batchDelete ($args)
{
	if (confirm('Delete Record?') == true)
	{
		document.getElementById($args).submit();
	}
}