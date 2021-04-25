<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script>
		// This is JavaScript function that validate HTML form data entry
		function checkform() {
			if(document.forms["login-form"]["student_id"].value == "") {
				alert( "Please Enter your Stundent ID!");
				return false;
			}
			if(document.forms["login-form"]["password"].value == "") {
				alert( "Please enter your password");
				return false;
			}
			return( true );
			}
	</script>
</head>

<body>
	<!-- login form -->
    <form name="login-form" onsubmit="return checkform()" action="login.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
		
		<!-- enter student ID -->
     	<label>Student ID</label>
     	<input type="student_id" name="student_id" placeholder="Student ID"><br>

		<!-- enter password -->
     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

		<!-- submit button -->
     	<button type="submit" name="submit" class="btn btn-success">Login</button>

		<!-- jump to sign up page -->
        <a href="signup.php" class="ca">Create an account</a>
    </form>
</body>
</html>