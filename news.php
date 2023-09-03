<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 	
	include_once("config/connection.php"); 		
	include_once("web/php/server/server_news.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>News | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/local/about.css" rel="stylesheet" />       
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="about">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<img src="web/media/images/banner_news.jpg" class="banner" alt="" />
<main class="container">
    <?php echo $buffer; ?>
<!--	
	<h1>Welcome to <?php echo $INI->abbr; ?> News</h1>
	<h2>RAFFLE DRAW! RAFFLE DRAW!! RAFFLE DRAW!!!</h2>
    <article>
        HURRAY!!!  HERE COMES  AN AMAZING OPPORTUNITY YOU CAN'T AFFORD TO MISS!
        <p></p>
        DO YOU KNOW THAT DURING G-HELPERS ZERO-INTEREST COOPERATIVE AGM/FUNFAIR, YOU CAN WIN ANY OF THE FOLLOWING ITEMS WITH JUST ONE HUNDRED NAIRA (<b>N100</b>)?
        <p></p>
        <ol>        
        <li>BIG SIZE WASHING MACHINE</li>
		<li>RICE COOKER</li>
		<li>KITCHEN BLENDER</li>
		<li>GENERATOR</li>
		<li>DEEP FREEZER</li>
		<li>MICROWAVE</li>
		<li>GAS CYLINDER WITH BURNER</li>
		<li>PLASMA TV</li>
		<li>iPhone</li>
		<li>AND LOTS MORE</li>
        </ol>
        <p></p>
        DISTANCE IS NOT A BARRIER AT ALL. ALL YOU NEED TO DO IS TO BUY A RAFFLE TICKET FROM ANY OF OUR MEMBERS.
        <p></p>
        <b>NOTE:</b> THE MORE TICKETS YOU BUY, THE MORE YOU INCREASE YOUR CHANCES OF WINNING.
        <p></p>
        DATE: NOVEMBER 30TH, 2019. FOR MORE ENQUIRIES,PLS, CONTACT +2349057011128. 
        <p></p>
        PLEASE, DON'T LET THE FEAR OF LOSING ONE HUNDRED NAIRA DENY YOU OF THIS GREAT OPPORTUNITY.
        <p></p>
        <a href="https://chat.whatsapp.com/E4AK29o7jJC7bOgOy456sR" target="_blank">Join WhatsApp Group</a>
    </article>
	<img src="web/media/uploads/20191130094000.jpg" style="width:400px;" class="banner" alt="" />    
-->
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
