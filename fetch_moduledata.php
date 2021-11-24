<?php
include "db_conn.php";

$student_id = $_SESSION['student_id'];

// fetch value
$sql = "SELECT  ms.module_cd, mn.module_info, ms.credit, ms.mark FROM modules ms 
INNER JOIN module_info mn ON ms.module_cd = mn.module_cd WHERE ms.student_id = ?" ;

// prepare statement
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $student_id);

// execute query
mysqli_stmt_execute($stmt);

// bind result to variables
mysqli_stmt_bind_result($stmt, $module_cd, $module_name, $credit, $mark);

$module_cds = [];
$module_names = [];
$credits = [];
$marks = [];

// fetch value
while(mysqli_stmt_fetch($stmt)){
	array_push($module_cds, $module_cd);
	array_push($module_names, $module_name);
	array_push($credits, $credit);
	array_push($marks, $mark);
}

?>

