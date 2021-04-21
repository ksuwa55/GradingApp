<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
     <script>
		// This is JavaScript function that validate HTML form data entry
		function checkform() {
		if(document.forms["signup-form"]["name"].value == "") {
		alert( "Name is required!");
		return false;
		}
		if(document.forms["signup-form"]["student_id"].value == "") {
		alert( "Student ID is required!");
		return false;
		}
          if(document.forms["signup-form"]["password"].value == "") {
		alert( "Password is required!");
		return false;
		}
          if(document.forms["signup-form"]["password"].value.length < 6) {
		alert( "Password must contain at least six characters!!");
		return false;
		}
          re = /[0-9]/;
          if(!re.test(document.forms["signup-form"]["password"].value)) {
          alert("Password must contain at least one number (0-9)!");
          return false;
          }

          re = /[a-z]/;
          if(!re.test(document.forms["signup-form"]["password"].value)) {
          alert("Password must contain at least one lowercase letter (a-z)!");
          return false;
          }

          re = /[A-Z]/;
          if(!re.test(document.forms["signup-form"]["password"].value)) {
          alert("Password must contain at least one uppercase letter (A-Z)!");
          return false;
          }

          if(document.forms["signup-form"]["re_password"].value == "") {
		alert( "Please enter your password again!");
		return false;
		}
          if(document.forms["signup-form"]["password"].value != document.forms["signup-form"]["re_password"].value){
          alert( "Please has not been matched!");
		return false;
          }
          
		return( true );
		}
	</script>
</head>
<body>
     <form name="signup-form" onsubmit="return checkform()" action="signup-check.php" method="post">
     	<h2>SIGN UP</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Name"><br>
          <?php }?>

          <label>Student ID</label>
          <?php if (isset($_GET['student_id'])) { ?>
               <input type="number" 
                      name="student_id" 
                      placeholder="Student ID"
                      value="<?php echo $_GET['student_id']; ?>"><br>
          <?php }else{ ?>
               <input type="number" 
                      name="student_id" 
                      placeholder="Student ID"><br>
          <?php }?>

     	<label>Password</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Password"
                 ><br>

          <label>Confirm Password</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirm Password"
                 ><br>

     	<button type="submit" class="btn btn-success">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>
</html>