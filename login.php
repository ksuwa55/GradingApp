<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['student_id']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$student_id = validate($_POST['student_id']);
	$pass = validate($_POST['password']);

	// hashing the password
	$pass = md5($pass);

	$sql = "SELECT * FROM users WHERE student_id='$student_id' AND password='$pass'";
	$result = mysqli_query($conn, $sql);

	// check whether an account exists
	if (mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if ($row['student_id'] === $student_id && $row['password'] === $pass) {
			$_SESSION['student_id'] = $row['student_id'];
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
			header("Location: home.php");
			exit();
		}else{
			header("Location: index.php?error=Incorect Student ID or password");
			exit();
		}
	}else{
		header("Location: index.php?error=Incorect Student ID or password");
		exit();
	}
	
}else{
	header("Location: index.php");
	exit();
}