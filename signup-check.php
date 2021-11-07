<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['student_id']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$studentid = validate($_POST['student_id']);
	$pass = validate($_POST['password']);

	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'student_id='. $studentid. '&name='. $name;

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE student_id='$studentid' ";
		$result = mysqli_query($conn, $sql);

		// the query to register a user
		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else{
            $sql2 = "INSERT INTO users(student_id, password, name) VALUES('$studentid', '$pass', '$name')";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2) {
				header("Location: signup.php?success=Your account has been created successfully");
				exit();
            }else{
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
            }
		}
}else{
	header("Location: signup.php");
	exit();
}