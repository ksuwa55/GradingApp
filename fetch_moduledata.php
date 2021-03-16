<?php
include "db_conn.php";

$student_id = $_SESSION['student_id'];

// fetch data using student ID
$sql = "SELECT  ms.module_cd, mn.module_name, ms.credit, ms.mark FROM modules ms 
INNER JOIN module_names mn ON ms.module_cd = mn.module_cd WHERE ms.student_id = '$student_id'" ;

$result = mysqli_query($conn, $sql);
// failed to query
if(!$result) {
	echo $mysqli->error;
	exit();
}

//$result->fetch_array(MYSQLI_ASSOC)
// store as an array
while($row = mysqli_fetch_array($result)){
	$rows[] = $row;
}

$result->free();
?>

