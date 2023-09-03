<?PHP
class Manifest
{
	function __construct ()
	{
		$this->root =			"super";		
		$this->appname = 		"SlingshotSAP";
		$this->typeface = 		"Slingshot<b>SAP</b>";
		$this->abbr =	 		"SSAP";
		$this->domain = 		"super.g-helpersventure.com";
		$this->url = 			"http://www.g-helpersventure.com/apps/super/";	
		$this->type = 			"Super Admin Portal";		
		$this->client = 		array 
								(
									"Company"=>"HWP Labs",
									"Name"=>"Tugbeh Emmanauel",
									"Email"=>"tugbeh.osaretin@gmail.com",
									"Phone"=>"08169960927"
								);
		$this->impressum =	 	"Copyright &copy; 2019 <a href='http://www.hwplabs.com/' target='_blank'>HWP Labs</a>. CRBN 658815";
		$this->framework =	 	"Deskter";
		$this->bundle =			"0.24.02.19";
		$this->dates = 			array 
								(
									"Initial"=>"2018/11/12",
									"Stable"=>"2019/11/09",
									"Expires"=>"2020/11/08",
									"Renewal"=>"09/11/2019 - 08/11/2020"
								);
	}
}
$MANIFEST = new Manifest();
?>