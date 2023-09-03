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
	<title>COMPLAN | <?php echo $INI->appname; ?></title>
    <link type="text/css" href="web/css/local/complan.css" rel="stylesheet" />       
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="complan">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main class="center">
    <p id="complan_a">&nbsp;</p>
	<ul class="tabs">
	    <li><a href="#complan_a" id="active">Complan A</a></li>
	    <li><a href="#complan_b">Complan B</a></li>
    </ul>    
    <section>
    	<h1>Complan A</h1>
		<article>
            <b style="color:#ee1111;">
            	NOTE: Registration into GHV Complan-A is only N1,000 for one account. <br/>
	            This takes you automatically into Stage 1 (Builder Level).
            </b> 
            <p></p>
        	Register with $5 (N1,000) and invite two persons each as your direct downlines. 
            Your direct downliners are also required to invite two persons each.
        </article>
		<?php include_once("web/php/local/plan_a.php"); ?>
       	<a href="register.php" class="go">Register Now  &rarr;</a>
	</section>
    <p id="complan_b">&nbsp;</p>
	<ul class="tabs">
	    <li><a href="#complan_a">Complan A</a></li>
	    <li><a href="#complan_b" id="active">Complan B</a></li>
    </ul>    
    <section>
    	<h1>Complan B</h1>
		<article>
            <b style="color:#ee1111;">NOTE: You will get $5 (N1,000) instantly as Referral Bonus on each person you introduce to the network.</b> <br/>
            <p></p>
            Register with $20 (N4,000) and immediately get a <b style="color:blue;">welcome pack worth $5 (N1,000)</b>.
        </article>        
		<?php include_once("web/php/local/plan_b.php"); ?>
       	<a href="register.php" class="go">Register Now  &rarr;</a>        
    </section>
</main>
<?php include_once("web/php/shared/footer.php"); ?>
</body>
</html>
