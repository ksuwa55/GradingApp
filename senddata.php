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
    $insert = "INSERT INTO modules (mark, student_id, module_cd) VALUES (?, ?, ?)";

    // Update query
    $update = "UPDATE modules SET mark = ? WHERE student_id = ? and module_cd = ?";


    if(mysqli_num_rows($result) == 0){
        $stml = mysqli_prepare($conn, $insert);  // if the record exists, the data will be inserted to database
    } else {
        $stml = mysqli_prepare($conn,$update);   // if the record does not exist, the data will be updated
    }

    // bind values to each variables
    mysqli_stmt_bind_param($stml, "iis", $mark, $student_id, $module_cd);
    mysqli_stmt_execute($stml);

    // back to the home page
    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: ".$uri, true, 303);
    }
?>