<?php 
include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
include_once("config/manifest.php"); 	
include_once("config/connection.php"); 		
include_once("lib/model/logic.php"); 			
include_once("web/php/server/validate.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
<?php 
include_once("lib/model/meta.php"); 
include_once("lib/model/import.php"); 
?>
<title>@Test | Root</title>
<link type="text/css" href="web/css/local/home.css" rel="stylesheet" />       
<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
</head>
<body>
<?PHP
$table = 'register';
$complan = 'A';
$user = array 
(
	'sponsor'=>'cnodolo',
	'fullname'=>'cisco odili',
	'username'=>'cisco',
	'password'=>'444',
	'pin'=>'B1234567'
);
$admin->sponsor = 'cnodolo';
$admin->fullname = 'cisco odili';
$admin->username = 'cisco';
$admin->password = '444';
$admin->pin = 'B1234567';

dump(round(120/200,2));
dump(toMoney(round(120/200,2)));
dump(toMoney(3.142));
/*dump((int)1.25);
dump(toNumber('N1.25'));/*

foreach (PYF_ENUM_SEED() as $row)
{
	$postArray[] = array
	(
		'sponsor'=>'johndoe',
		'fullname'=>$row[0],
		'username'=>$row[1],
		'password'=>'4444',		
		'pin'=>'A00000'.$row[2]
	);
}
//PYF_CRUD_SEED($table,$postArray);

?>
</body>
</html>