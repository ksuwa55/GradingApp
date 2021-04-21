<?php 
session_start();
include "db_conn.php";

if($_POST['submit']){

    $student_id = $_SESSION['student_id'];
    $module_cd = $_POST['module_cd'];
    $credit = $_POST['credit'];
    $mark = $_POST['mark'];

    // The query that check whether the record already exist
    $check_exist = "SELECT * FROM modules WHERE (student_id = '$student_id') and (module_cd = '$module_cd')";
    $result = mysqli_query($conn, $check_exist);

    // Insert query
    $insert = "INSERT INTO modules (credit, mark, student_id, module_cd) VALUES (?, ?, ?, ?)";

    // Update query
    $update = "UPDATE modules SET credit = ?, mark = ? WHERE student_id = ? and module_cd = ?";


    // If statement
    if(mysqli_num_rows($result) == 0){
        $stml = mysqli_prepare($conn, $insert);
    } else {
        $stml = mysqli_prepare($conn,$update);
    }

    mysqli_stmt_bind_param($stml, "iiis", $credit, $mark, $student_id, $module_cd);
    mysqli_stmt_execute($stml);

    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: ".$uri, true, 303);
    }
?>