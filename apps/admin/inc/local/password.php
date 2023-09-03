<p id="change"></p>
<div class="container">
	<div class="caption">Change Password <a href="#">Menu</a></div>
    <div class="wrap">
     <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>   
		<label>Current Password :</label>
        <input type="password" name="current" id="password" value="<?php echo $_POST['current']; ?>" placeholder="Enter current password"  required />

		<label>New Password :</label>                
        <input type="password" name="new" id="psw1" value="<?php echo $_POST['new']; ?>" placeholder="Enter new password" required />
        
		<label>Confirm New Password :</label>
        <input type="password" id="psw2" placeholder="Re-enter new password" onBlur="$_confirmPassword('psw1','psw2')" required />

		<div class="fgroup">
            <input type="submit" name="update-password" value="Update" />
        </div>     
    </fieldset>
    </form> 
    </div>
</div>