<p id="bank"></p>
<div class="container">
	<div class="caption">Bank Details <a href="#">Menu</a></div>
    <div class="wrap">
     <form class="tmp-form" <?php echo PYF_FORM_POST(); ?>>
		<label>Bank Name :</label>
        <input type="text" name="bank" value="<?php echo $USER->bank; ?>" required />
        
		<label>Account Name :</label>
        <input type="text" name="acct_name" value="<?php echo $USER->acct_name; ?>" required />
        
		<label>Account Number :</label>
        <input type="text" name="acct_no" value="<?php echo $USER->acct_no; ?>" required />
		<div class="fgroup">
            <input type="submit" name="update-bank" value="Update" />
        </div>     
    </fieldset>
    </form> 
    </div>
</div>