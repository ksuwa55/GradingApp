<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "grading_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

// check connection
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}