// JavaScript Document
function $_localSub ()
{
	var $target = document.getElementById('sub');
	if ($target.checkValidity() == true)
	{
		var $query = "email="+$target.value;
		$_post('web/php/server/sub.php',$query,$_dummy);
		alert("Thank you for subscribing to our Newsletter");
		$target.value = "";						
	}
	else 
	{
		alert("Enter a valid Email Address"); 
		$target.focus();
	}
}
function $_autofill ($args)
{
	var $form = document.getElementById($args);
	var $ctrl = $form.querySelectorAll('[name]');
	var $array = 
	[
		"sobi",
		"Tugbeh Emmanuel",
		"0",
		"1992-09-15",
		"Nigeria",
		"Edo",
		"Benin",
		"08169960927",
		"dehphantom@yahoo.com",
		"0",
		"GTBank",
		"Tugbeh Emmanuel Osaretin",
		"0131988214",
		"Roselyn Tugbeh",
		"2gbeh",
		"ghvb0y",
		"A1234567"
	];
	for (var i = 0; i < $ctrl.length; i++)
		$ctrl[i].value = $array[i];
}