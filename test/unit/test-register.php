<label>Compensation Plan :</label>
<select name="pin" required>
<option></option>
<option value="A1234567">COMPLAN A</option>
<option value="B1234567">COMPLAN B</option>
</select>
<label>Sponsor ID :</label>
<input type="text" name="sponsor" value="<?php echo $_POST['sponsor']; ?>" placeholder="Enter Username of Sponsor" required />                             
<label>Username :</label>
<input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter Username" required />
<input type="hidden" name="password"  value="1234" />