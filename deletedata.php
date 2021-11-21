<?php

// Using database connection file here
include "db_conn.php"; 

// get module_cd through query string
$module_cd = $_GET['module_cd']; 

// get student ID through the session
session_start();
$student_id = $_SESSION['student_id'];

// delete query
$del = mysqli_query($conn,"delete from modules where module_cd = '$module_cd' and student_id = '$student_id'  "); 

if($del){
    mysqli_close($conn); // Close connection
    header("location:home.php"); // redirects to all records page
    exit;	
}else{ echo "Error deleting record"; }

?>