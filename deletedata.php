<?php
session_start();

include "db_conn.php"; // Using database connection file here

$module_cd = $_GET['module_cd']; // get id through query string
$student_id = $_SESSION['student_id'];

$del = mysqli_query($conn,"delete from modules where module_cd = '$module_cd' and student_id = '$student_id'  "); // delete query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:home.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>