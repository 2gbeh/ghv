<header class="ribbon" ondblclick="$_toBottom()">
<table border="0">
<tr>
    <td>
    	<div class="typeface">
        	<a href="">
            	<img src="img/Glyph.png" border="0" alt="" />
				<?php echo $MANIFEST->typeface; ?>
            </a>
        </div>
	</td>
    <td>
    <ul class="nav">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="records.php">Records</a></li>
        <li><a href="add.php">Add/Modify</a></li>
        <li><a onClick="$_smartConfirm('Logout of Application?','?logout=true')">Logout</a></li>
    </ul>
    <equiv onclick="$_toggle('django')">&equiv;</equiv>
    </td>
</tr>
</table>
</header>

<nav class="flat" id="django" data-viewport="600">
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="records.php">Records</a></li>
        <li><a href="add.php">Add/Modify</a></li>
        <li><a onClick="$_smartConfirm('Logout of Application?','?logout=true')">Logout</a></li>
    </ul>    
</nav>

