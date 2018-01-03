<!DOCTYPE html>
<html>
<head>
	<title>Sign Up User</title>
</head>
<body>
	<h4>SIGN UP</h4>
  	<form method="POST" action="<?php echo site_url()?>/user/cUser/signup">
	  	first name: <br>
	  	<input type="text" name="fname" required=""> <br>
	  	middle initial: <br>
	  	<input type="text" name="miname" required=""> <br>
	  	last name: <br>
	  	<input type="text" name="lname" required=""> <br>
	  	email: <br>
	  	<input type="email" name="email" required=""> <br>
	  	birthdate: <br>
	  	<input type="text" name="bdate" required=""> <br>
	  	gender: <br>
	  	<select name="gender" required=""> <br>
	  		<option selected="" value="Male">select gender</option>
	  		<option value="Male">male</option>
	  		<option value="Female">female</option>
	  		<option value="Other">other</option>
	  	</select> <br>
	  	contact no.: <br>
	  	<input type="text" name="contact" required=""> <br>
	  	username: <br>
	  	<input type="text" name="uname" required=""> <br>
	  	password: <br>
	  	<input type="password" name="password" required=""> <br>

	  	<button type="button submit">SIGN UP</button>
  	</form>


</body>
</html>
