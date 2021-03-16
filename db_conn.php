<?php

$sname= "localhost";
$unmae= "root";
$password = "";

$db_name = "grading_db";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!".mysqi_connect_error();
}