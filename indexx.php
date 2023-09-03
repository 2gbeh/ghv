<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php"); 		
	include_once("config/manifest.php"); 
	include_once("config/connection.php"); 	
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		include_once("lib/model/meta.php"); 
		include_once("lib/model/import.php"); 
	?>
	<title>Welcome to <?php echo $INI->typeface; ?></title>
    <link type="text/css" href="web/css/local/home.css" rel="stylesheet" />
    <link type="text/css" href="web/css/local/popup.css" rel="stylesheet" />    
	<link type="text/css" href="web/css/shared/responsive.css" rel="stylesheet" />         
	<script type="text/javascript" src="web/js/local/popup.js"></script>
</head>
<body class="home">
<?php include_once("web/php/shared/header.php"); ?>
<?php include_once("web/php/shared/nav.php"); ?>
<main>
	<section class="slide backdrop scroll" id="slideshow" data-base="web/media/images/" data-img="slide_1.jpg,slide_2.jpg,slide_3.jpg" data-timer="5">
        <div class="slide-wrap">
            <h1>GHV...For HELP</h1>
            <h2>Hunger Eradication &amp; Lasting Prosperity</h2>
        </div>
    </section>
	<section class="about center">
        <ul>
        <li>
            <h2>About Us</h2>
            <article>
                <?php echo $INI->appname; ?> is a unique multi-level marketing organization which was born out of the need to help people eradicate hunger and poverty by storing their kitchen  with a lot of food items and building them up financially to the level of experiencing and sustaining a very high standard in every area of living through her services and her compensation plans which are very easy to achieve within the shortest time possible via team work and commitment.
            </article>        
            <a href="about.php" class="go">Learn more &rarr;</a>            
        </li>        
        <li class="thumb backdrop">&nbsp;</li>    
    </ul>
    </section> 
	<section class="services center">
        <h2>Our Services</h2>
        <ul>
            <li>Human Capital Development</li>
            <li>Trade &amp; Skills Acquisition</li>
            <li>Wealth Creation</li>
            <li>Zero-interest Loan Facility</li>
            <li>Food Security</li>
            <li>Child Educational Scholarship</li>
            <li>Assets &amp; Property Acquisition</li>
            <li>Flight &amp; Hotel Booking</li>           
        </ul>
        <a href="register.php" class="go">Get started  &rarr;</a>
    </section>   
    <section class="gallery overflow"> 
        <table>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td></td>
            <td colspan="2">&nbsp;</td>
        </tr>        
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        </table>
    </section>
    <section class="vision center">
       	<h1>Our Vision</h1>
    	<h2>
        	To help create a world whereby a very high standard of living becomes the general standard of living among people. 
        	<p></p>
            A world whereby luxury is common.
        </h2>
    </section>        
    <section class="benefits center">
	    <h2>Why you need to join <?php echo $INI->appname; ?></h2>
        <p></p>
        <ul>
         <li>
            <ol>
                <li>No buying and selling of products</li>
                <li>Weekly free food items/payments guaranteed</li>
            </ol>                
        </li>
         <li>
            <ol>
                <li>You only register once</li>
                <li>Working spill over available</li>
            </ol>                
        </li>
         <li>
            <ol>
                <li>No earning conditions</li>
                <li>Trade and skill acquisition with scholarship scheme</li>
            </ol>                
        </li> 
        <li>
            <ol>
                <li>Exotic brand new Cars and house awards.</li>
                <li>Zero-interest loan and lots more.</li>
            </ol>  
         </li>
        </ul>
    	<a href="complan.php" class="go">View Compensation Plan  &rarr;</a>
    </section>
</main>
<?php include_once("web/php/local/popup.php"); ?>
<?php include_once("web/php/shared/footer.php"); ?>
<script type="text/javascript">
showPopup();
setTimeout($_slideshow,5000);
</script>
</body>
</html>
