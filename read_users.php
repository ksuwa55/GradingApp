<?php
include "db_conn.php";

// $student_id = $_SESSION['student_id'];

// fetch value
// $sql = "SELECT  ms.module_cd, mi.module_name, mi.credit, ms.mark FROM modules ms 
// INNER JOIN module_info mi ON ms.module_cd = mi.module_cd WHERE ms.student_id = ?" ;

$sql = "SELECT name FROM users where admin = 0";

// prepare statement
$stmt = mysqli_prepare($conn, $sql);
// mysqli_stmt_bind_param($stmt, "i", $student_id);

// execute query
mysqli_stmt_execute($stmt);

// bind result to variables
mysqli_stmt_bind_result($stmt, $user_name);

$all_user_names = [];

// fetch value
while(mysqli_stmt_fetch($stmt)){
	array_push($all_user_names, $user_name);
}
?>
