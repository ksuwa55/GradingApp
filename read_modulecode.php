<?php
include "db_conn.php";

// $student_id = $_SESSION['student_id'];

// fetch value
// $sql = "SELECT  ms.module_cd, mi.module_name, mi.credit, ms.mark FROM modules ms 
// INNER JOIN module_info mi ON ms.module_cd = mi.module_cd WHERE ms.student_id = ?" ;

$sql = "SELECT module_cd FROM module_info";

// prepare statement
$stmt = mysqli_prepare($conn, $sql);
// mysqli_stmt_bind_param($stmt, "i", $student_id);

// execute query
mysqli_stmt_execute($stmt);

// bind result to variables
mysqli_stmt_bind_result($stmt, $module_cd);

$all_module_cds = [];

// fetch value
while(mysqli_stmt_fetch($stmt)){
	array_push($all_module_cds, $module_cd);
}
?>
