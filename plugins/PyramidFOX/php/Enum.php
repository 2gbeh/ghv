<?PHP
function PYF_ENUM ($args)
{
	if ($args == 'sex') 
		$array = array ("M","F");		
	if ($args == 'gender') 
		$array = array ("Male","Female");	
	if ($args == 'marital') 
		$array = array ("Single","Married","Separated","Divorced","Widowed");		
	if ($args == 'pos') 
		$array = array ("ATM Transfer","Bank Deposit","Mobile App","USSD Transfer");
	return $array;
}
function PYF_ENUM_SEED ($args)
{
	$map = array
	(
		array('Tugbeh Emmanuel','M','etugbeh','1'),
		array('Obi Sopuluchukwu','M','sobi','2'),
		array('Ndolo Chimaobi','M','cnodolo','3'),
		array('Daniel Ugonna','M','udaniel','4'),
		array('Nwokejiobi Wisdom','M','wnwokejiobi','5'),
		array('Nisakpo Joshua','M','jnisakpo','6'),
		array('Oiboh Peter','M','poiboh','7'),
		array('Ogbeomoide James','M','jogbeomoide','8'),
		array('Osagie Eseosa','F','eosagie','9'),
		array('Molokwu Chijioke','M','cmolokwu','10'),
		array('Tugbeh Roosevelt','M','rtugbeh','11'),
		array('Chimeume Adaeze','F','achimeume','12'),
		array('Nworgu Kingsley','M','knworgu','13'),
		array('Osarokwata Emerald','F','eosarokwata','14'),
		array('Olasinde Morolake','F','molasinde','15'),
		array('Okosun Deborah','F','dokosun','16'),	
		array('Orih Prince','M','porih','17'),
		array('Alokwe Peter','M','palokwe','18'),
		array('Okhuebor Cynthia','F','cokhuebor','19'),
		array('Iteire Favour','M','fiteire','20'),
		array('Tugbeh Jackson','M','jtugbeh','21'),
		array('Iteire Afor','M','aiteire','22'),	
		array('Okundia Festina','F','fokundia','23'),
		array('Ogobegwu Jennifer','F','jogobegwu','24'),
		array('Anyahuruba Franca','F','fanyahuruba','25')
	);
	if (is_numeric($args) && array_key_exists($args,$map)) {return $map[$args];}
	else {return $map;}
}
?>