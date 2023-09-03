<label>Sponsor ID :</label>
<input type="text" name="sponsor" value="<?php echo $_POST['sponsor']; ?>" placeholder="Enter Username of Sponsor" required />

<label>Full Name :</label>
<input type="text" name="fullname" value="<?php echo $_POST['fullname']; ?>" placeholder="Enter Full Name (*Surname First)" required />
        
<label>Select Gender :</label>
<select name="gender" required>
<?php echo PYF_FORM_OPTION('gender',$_POST['gender']); ?>
</select>

<label>Date of Birth (YYYY-MM-DD):</label>
<input type="date" name="dob" value="<?php echo $_POST['dob']; ?>" placeholder="YYYY-MM-DD" maxlength="10" required />

<label>Country :</label>
<input type="text" name="country" value="<?php echo $_POST['country']; ?>" placeholder="Enter Country of Residence" required />

<label>State :</label>
<input type="text" name="state" value="<?php echo $_POST['state']; ?>" placeholder="Enter State of Residence" required />

<label>City :</label>
<input type="text" name="city" value="<?php echo $_POST['city']; ?>" placeholder="Enter City of Residence" required />

<label>Phone Number :</label>
<input type="tel" name="phone" value="<?php echo $_POST['phone']; ?>" placeholder="Enter Phone Number" required />

<label>Email Address :</label>
<input type="email" name="email" value="<?php echo $_POST['email']; ?>" placeholder="Enter Email Address" required />

<label>Marital Status :</label>
<select name="marital" required>
<?php echo PYF_FORM_OPTION('marital',$_POST['marital']); ?>
</select>

<label>Bank Name :</label>
<input type="text" name="bank" value="<?php echo $_POST['bank']; ?>" placeholder="Enter Name of Financial Institution" required />

<label>Account Name :</label>
<input type="text" name="acct_name" value="<?php echo $_POST['acct_name']; ?>" placeholder="Enter Bank Account Name" required />

<label>Account Number :</label>
<input type="text" name="acct_no" value="<?php echo $_POST['acct_no']; ?>" placeholder="Enter Bank Account Number" required />

<label>Next of Kin :</label>
<input type="text" name="kin" value="<?php echo $_POST['kin']; ?>" placeholder="Enter Full Name of Next of Kin" required />
                        
<label>Username :</label>
<input type="text" name="username" value="<?php echo $_POST['username']; ?>" placeholder="Enter Username" required />
        
<label>Password :</label>
<input type="password" id="psw1" name="password"  value="<?php echo $_POST['password']; ?>" placeholder="Enter Password" required />

<label>Confirm Password :</label>
<input type="password" id="psw2" onBlur="$_confirmPassword('psw1','psw2')" placeholder="Re-enter Password" required />

<label>Transaction Pin :</label>
<input type="text" name="pin" value="<?php echo $_POST['pin']; ?>" placeholder="Enter 8-Character Transaction PIN" maxlength="8" required />
