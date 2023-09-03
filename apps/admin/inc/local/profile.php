<p id="profile"></p>
<div class="container">
	<div class="caption">Profile Details <a href="#">Menu</a></div>
    <div class="wrap">
     <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>
		<label>Email Address :</label>
        <input type="email" name="email" value="<?php echo $ADMIN->email; ?>" required />

		<label>Username :</label>
        <input type="text" name="username" value="<?php echo $ADMIN->username; ?>" disabled />		

		<div class="fgroup">
            <input type="submit" name="update-profile" value="Update" />
        </div>     
    </fieldset>
    </form> 
    </div>
</div>