<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>FAQs | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/local/faq.css" rel="stylesheet" />       
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="faq">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main class="container">
	<h1>Frequently Asked Questions (FAQs)</h1>
    <h2>Q1. What is Complan?</h2>
    <article>
    	Compensation Plan
    </article>	
    
    <h2>Q2. How much does it cost to join <?php echo $INI->appname; ?>?</h2>
	<article>
        You register with one entry payment of N1,000 for <a href="complan.php#complan_a">Compensation Plan A</a> 
        and one entry payment of N4,000 for <a href="complan.php#complan_b">Compensation Plan B</a>.
    </article>

	<h2>Q3. How do I register?</h2>
	<article>
    	Purchase an e-Pin for registration, click on <a href="register.php">Register</a>, then proceed.
	</article>        

	<h2>Q4. How can I purchase an e-Pin?</h2>
	<article>
		Kindly contact the person who introduced you to our network so that he/she can provide you with the neccessary details. 
        <p></p>
        You can also <a href="contact.php">Contact Us</a> directly on any of these numbers 
        +234(0) 90 5701 1128, +234(0)90 2308 6552, +234(0) 81 4705 0294.
	</article>

	<h2>Q5. How many accounts can I register?</h2>
	<article>
    	You can register as many as you can. There is no limit to the number of accounts you can register as an individual as long as you can conveniently manage them.
	</article>        
	
    <h2>Q6. How many persons do I need to sponsor before I can earn?</h2>
    <article> 
		In <a href="complan.php#complan_a">Compensation Plan A</a>, you are expected to sponsor a minimum of 2 persons directly on <b>Builder Stage</b>. 
        <p></p>
        In <a href="complan.php#complan_b">Compensation Plan B</a>, you are expected to sponsor a minimum of 3 persons directly on <b>Feeder Stage</b>.
	</article>
    
	<h2>Q7. What if I register more than the minimum number of persons required in the First stage?</h2>
	<article>
		The minimum number of persons required in the First stage will be placed under you and the rest will spill to your downlines whom are yet to sponsor anyone under them,  
        and as a result, helping your generation grow faster.
	</article>
	
	<h2>Q8. When do I get my stage rewards and incentives?</h2>
	<article>
		Awards are given after the completion of each stage.
    </article>

	<h2>Q9. What is Sponsor ID?</h2>
	<article>
		The Sponsor ID is the membership ID of the person referring you. It is also called the <b>Referrer's ID</b> of the person who gets the referrer bonus.
	</article>

	<h2>Q10. What is Parent ID?</h2>
	<article>
		Parent ID is the membership ID of the person who you want to place the new registration under. 
        The parent of any downline is the immediate person above the downline on whose left or right leg the downline is placed.
	</article>        
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
