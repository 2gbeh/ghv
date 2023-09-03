<header class="fixed bigshadow overflow" ondblclick="$_toBottom()"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<table border="0">
    <tr>
    	<td>
	       	<a href="" title="Reload Page"><img src="../../<?php echo $INI->logo; ?>" alt="<?php echo $INI->appname; ?>" /></a>
        </td>
        <td>
        <ul>
            <li><a href="home.php" id="selected">Dashboard</a></li>
            <li><a href="account.php">Accounts <?php echo pill('register'); ?></a></li>
            <li><a href="payment.php">Payments <?php echo pill('payment'); ?></a></li>
            <li><a href="pin.php">Pins</a></li>
            <li><a href="debit.php">Withdrawals <?php echo pill('debit'); ?></a></li>
            <li><a href="ledger.php">Ledger</a></li>
            <li><a href="fintech.php">Assign Upliner &amp; Pay Bonus</a></li>
            <li><a href="matrix.php" target="_blank">User Matrix</a></li>
            <li><a href="tracker.php">Stage Tracker</a></li>
            <li><a href="news_form.php"><?php echo $INI->abbr." News ".toLabel('New'); ?></a></li>
            <li><a href="help.php">Help Desk <?php echo pill('help'); ?></a></li>
            <li><a href="contact.php">Enquiries <?php echo pill('contact'); ?></a></li>
            <li><a href="subscribe.php">Newsletters</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="../../indexx.php" target="_blank">Visit Website</a></li>
            <li><a href="?logout=true">Logout</a></li>
        </ul>
       	<a href="#" class="equiv" onclick="$_toggle('django')">&equiv;</a>
        </td>
    </tr>
    </table>
</header>
<div class="whitespace"></div>