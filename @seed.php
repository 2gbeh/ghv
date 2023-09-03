<?php 
include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
include_once("config/manifest.php"); 	
include_once("config/connection.php"); 		
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head charset="UTF-8">
<title>@Seed</title>
</head>
<body>
<?php 
$run = false;
if ($run == true)
{
	$table = 'register';
	$array = PYF_ENUM_SEED();
	foreach ($array as $row)
	{
		if ($row[1] == 'M') {$row[1] = 0;}
		else {$row[1] = 1;}
		$post[] = array
		(
			'sponsor'=>'johndoe',
			'fullname'=>$row[0],
			'gender'=>$row[1],
			'email'=>$row[2].'@example.com',
			'phone'=>'01012345678',
			'username'=>$row[2],
			'password'=>'1234',
			'pin'=>'A0123456'
		);
	}
	PYF_CRUD_SEED($table,$post);
}
?>
</body>
</html>