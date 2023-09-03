<p id="profile"></p>
<div class="container">
	<div class="caption">Profile Details <a href="#">Menu</a></div>
    <div class="wrap">
     <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>
		<label>Full Name :</label>
        <input type="text" name="fullname" value="<?php echo $USER->fullname; ?>" disabled />
                
		<label>Select Gender :</label>
        <select name="gender" disabled>
	    <?php echo PYF_FORM_OPTION('gender',$USER->gender); ?>        
        </select>

		<label>Date of Birth (YYYY-MM-DD):</label>
        <input type="date" name="dob" value="<?php echo $USER->dob; ?>" disabled />
        
		<label>Country :</label>
        <input type="text" name="country" value="<?php echo $USER->country; ?>" required />
        
		<label>State :</label>
        <input type="text" name="state" value="<?php echo $USER->state; ?>" required />
        
		<label>City :</label>
        <input type="text" name="city" value="<?php echo $USER->city; ?>" required />
        
        <label>Phone Number :</label>
        <input type="tel" name="phone" value="<?php echo $USER->phone; ?>" required />
        
		<label>Email Address :</label>
        <input type="email" name="email" value="<?php echo $USER->email; ?>" disabled />
        
		<label>Marital Status :</label>
        <select name="marital" required>
        <?php echo PYF_FORM_OPTION('marital',$USER->marital); ?>
        </select>
        
   		<label>Next of Kin :</label>
        <input type="text" name="kin" value="<?php echo $USER->kin; ?>" required />

		<label>Sponsor ID :</label>
        <input type="text" name="sponsor" value="<?php echo $USER->sponsor; ?>" disabled />
                                
		<label>Username :</label>
        <input type="text" name="username" value="<?php echo $USER->username; ?>" disabled />		
        
		<label>Transaction Pin :</label>
        <input type="text" name="pin" value="<?php echo $USER->pin; ?>" disabled />

		<div class="fgroup">
            <input type="submit" name="update-profile" value="Update" />
        </div>     
    </fieldset>
    </form> 
    </div>
</div>