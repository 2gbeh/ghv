<?PHP
include_once("enums.php");
class Manifest
{
	var $enums;
	function __construct ()
	{
		$this->root =			"ghv";		
		$this->appname = 		"G-Helpers Venture";
		$this->domain = 		"g-helpersventures.com";
		$this->typeface = 		"Gabrio Helpers Venture";
		$this->abbr =	 		"GHV";		
		$this->type = 			"Network Marketing Services";		
		$this->favicon = 		"web/media/icons/favicon.ico";		
		$this->logo = 			"web/media/images/logo.png";
		$this->theme = 			"#01903E";
		$this->theme2 = 		"#26176C";
		$this->theme3 = 		"#D72519";
		$this->enums =  		$GLOBALS['ENUMS'];
		$this->contractor = 	"HWP Labs";
		$this->client = 		"Gabrio Helpers Venture";
		$this->name = 			"Akinnayajo Gabriel";
		$this->email = 			"akinnayajogab@gmail.com";	
		$this->number = 		"+234(0) 90 5701 1128";		
		$this->webmail =		"info@g-helpersventures.com";
		$this->webmail2 = 		"support@g-helpersventures.com";
		$this->webmail3 = 		"contact@g-helpersventures.com";
		$this->mailer =			"GHV Admin";
		$this->impressum =	 	"Copyright &copy; 2018 ".$this->client.". BN 2618728";
		$this->copyright = 		"Copyright &copy; 2011 <a href='http://www.hwplabs.com/'>HWP Labs</a>. CRBN 658815";

		$this->api =	 		"PyramidFOX";
		$this->bundle = 		"1.10.12.18";
		$this->initial = 		"2018/11/12";
		$this->stable = 		"2019/11/09";
		$this->expires = 		"2020/11/08";
	}
}
$INI = new Manifest();
?>