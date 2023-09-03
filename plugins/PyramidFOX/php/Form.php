<?PHP
function PYF_FORM_SELF () {return htmlspecialchars($_SERVER["PHP_SELF"]);}
function PYF_FORM_POST () 
{
	$action = 'action="'.PYF_FORM_SELF().'" ';
	$method = 'method="POST" ';
	$autoc = 'autocomplete="off"';
	return $action.$method.$autoc;
}
function PYF_FORM_GET () 
{
	$action = 'action="'.PYF_FORM_SELF().'" ';
	$method = 'method="GET" ';
	$autoc = 'autocomplete="off"';
	return $action.$method.$autoc;
}
function PYF_FORM_FILE () 
{
	$action = 'action="'.PYF_FORM_SELF().'" ';
	$method = 'method="POST" ';
	$enctype = 'enctype="multipart/form-data" ';
	$autoc = 'autocomplete="off"';
	return $action.$method.$enctype.$autoc;
}
function PYF_FORM_OPTION ($type, $sel) 
{
	$array = PYF_ENUM($type);
	$buffer = "<option></option>";
	foreach ($array as $key => $value) 
	{
		if (isset($sel) && $sel == $key) $selected = 'selected';
		else if (isset($sel) && $sel == $value) $selected = 'selected';
		else $selected = '';		
		$buffer .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
	}
	return $buffer;	
}
function PYF_FORM_DATALIST ($type, $array)
{
	if (!is_array($array)) {$array = PYF_ENUM($type);}
	$buffer = "";
	foreach ($array as $value)
		$buffer .= '<option value="'.$value.'" />';
	$output = '<datalist id="list-'.$type.'">'.$buffer.'</datalist>';
	return $output;
}
?>