<?PHP
$landing = "../../login.php";
logstate($landing);
if (!appstate('user')) {logout($landing,"?err=@Log in to access Dashboard.");}
else
{
	// account
	$USER = account("register",$_SESSION['user']);
	if (!$USER) {logout($landing,"?err=@Session closed. Log in to access Dashboard.");}
	// e-wallet
	$WALLET = wallet("debit",$USER->username);
	// debit
	$DEBIT = debit("debit",$USER->username);	
	// complan
	$COMPLAN = complan($USER);
	// sponsor
	$SPONSOR = sponsor("register",$USER->sponsor);
	// upliner
	$UPLINER = upliner($USER);
	// matrix
	$MATRIX = getMatrix("register",$USER);	
	// stage
	$TRACKER = trackStage("tracker",$USER);	
}
?>