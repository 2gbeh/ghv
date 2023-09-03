<?PHP
function PYF_STR_EXIST ($needle, $haystack)
{
	if (strpos($haystack,$needle)) return true;
	else return false;
}
function PYF_STR_REPLACE ($from, $to, $in) {return str_replace($from,$to,$in);}
function PYF_STR_DELIMIT ($var)
{
	if (PYF_STR_EXIST("-",$var))
		return PYF_STR_REPLACE("-","/",$var);
	else if (PYF_STR_EXIST("/",$var))
		return PYF_STR_REPLACE("/","-",$var);
	else
		return $var;
}
function PYF_STR_RICHTEXT ($dbcon, $buffer)
{
	$buf_esc = mysqli_real_escape_string($dbcon,$buffer);
	$buf_p = str_replace('\r\n\r\n','<p></p>',$buf_esc);
	$buf_br = str_replace('\r\n','<br/>',$buf_p);
	$buf_apos = str_replace('\\','',$buf_br);
	$output = $buf_apos;
	return $output;
}
?>