<?php
$table = "news";	
$sql = "SELECT * FROM ".$table." ORDER BY id DESC LIMIT 1";
$resultSet = $CONN->query($sql);
$row = $resultSet->fetch_assoc();
$popup_title = $row['headline'];
$popup_article = substr($row['article'],0,320);
$popup_action = "news.php#aid_".$row['id'];
$CONN->close();	
?>
<div class="popup" id="popup">
	<div class="popup_cancel"><a onclick="hidePopup()" title="Close">&times;</a></div>
	<div class="popup_title">*** GHV NEWS ***</div>    
    <div class="popup_headline"><?php echo $popup_title; ?></div>
    <div class="popup_article"><?php echo $popup_article; ?> ...</div>
    <div class="popup_action">
    	<a href="<?php echo $popup_action; ?>" title="GHV News">Read More</a>
    </div>
</div>