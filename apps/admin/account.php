<?php 
	include_once("plugins/PyramidFOX/php/@lib(php).php");
	include_once("../../config/manifest.php");
	include_once("../../config/connection.php");
	include_once("../../lib/model/logic.php");				
	include_once("php/shared/appstate.php");	
	include_once("php/local/smartdel.php");				
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<?php 
		$noviewport = true;
		include_once("../../lib/model/meta.php"); 
		include_once("plugins/PyramidFOX/css/@lib(css).php");		
		include_once("plugins/PyramidFOX/js/@lib(js).php");	
		include_once("inc/shared/head.php"); 			
	?>
	<title>Registration Records | Admin Portal</title>
    <link type="text/css" href="css/shared/master.css" rel="stylesheet" />
	<link type="text/css" href="css/shared/responsive.css" rel="stylesheet" />         
</head>
<body class="account">
<?php include_once("inc/shared/header.php"); ?>
<?php include_once("inc/shared/nav.php"); ?>

<div class="container">
    <div class="caption">Registration Records</div>
    <div class="wrap overflow">
	<?php echo PYF_DISPLAY_ERROR($err); ?>  
   <form class="tmp-form" <?php echo PYF_FORM_GET(); ?>>    
        <input type="search" name="search" value="<?php echo $_GET['search']; ?>" placeholder="Search Username and press Enter key" list="mylist" required />
        <?php echo getDatalist(); ?>
        <input style="display:none;" type="submit" />
    </form>               
    <table class="tmp-table">
    <?php
		$table = "register";
		$limit = 100;
		if (isset($_GET['search'])) {$sort = "WHERE username='".$_GET['search']."'";}
		else
		{
			if (isset($_GET['pager'])) {$sort = PYF_TABLE_PAGER('acct',$limit);}
			else {$sort = "ORDER BY id LIMIT ".$limit;}
		}
		$sql = "SELECT * FROM ".$table." ".$sort;
		//ORDER BY id DESC
		$result = $CONN->query($sql);
		if ($result->num_rows > 0) 
		{
			$output = "";
			$sn = 1;
			 while($row = $result->fetch_assoc()) 
			 { 
				 $output .= '<tr>
					<td><a class="btn btn-sec" data-table="'.$table.'" data-id="'.$row['id'].'" onClick="$_smartDelete(this)">Delete</a></td>
					<td>'.$sn.'</td>
					<td>'.toTitle($row['fullname']).'</td>
					<td>'.toGender($row['gender']).'</td>
					<td>'.$row['username'].'</td>
					<td>'.$row['password'].'</td>					
					<td>'.$row['pin'].'</td>
					<td>'.$row['sponsor'].'</td>
					<td>'.smartDate($row['dob']).'</td>
					<td>'.toTitle($row['country']).'</td>
					<td>'.toTitle($row['state']).'</td>
					<td>'.toTitle($row['city']).'</td>
					<td>'.$row['phone'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.toMarital($row['marital']).'</td>
					<td>'.toTitle($row['bank']).'</td>
					<td>'.toTitle($row['acct_name']).'</td>
					<td>'.$row['acct_no'].'</td>
					<td>'.toTitle($row['kin']).'</td>
					<td>'.t_eta($row['eta']).'</td>					
				</tr>';
				$sn++;
			 }
			 $caption = 'Showing rows 0 - '.($sn-2).' (~'.($sn-1).', Query took 0.00'.date('s').' sec)';
		}
		else {$caption = "No records found";}
		$CONN->close();	
	?>      
	<!--<caption>Showing rows 0 - 9 (~10, Query took 0.0015 sec)</caption>-->
	<caption><?php echo $caption; ?></caption>    
    <tr>
    	<th>&nbsp;</th>
        <th>S/N</th>
        <th>Full Name</th>
        <th>Gender</th>        
        <th>Username</th>
        <th>Password</th>
        <th>Transaction Pin</th>        
        <th>Sponsor ID</th>        
        <th>Date of Birth</th>
        <th>Country</th>
        <th>State</th>
        <th>City</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Marital Status</th>
        <th>Bank</th>
        <th>Account Name</th>
        <th>Account Number</th>
        <th>Next of Kin</th>
        <th>Date of Registration</th>        
    </tr>
    <?php echo $output;	?>
    </table>
	<?php include_once("inc/local/pager.php"); ?>	  
	</div>    
</div>

<?php include_once("inc/shared/footer.php"); ?>
</body>
</html>
