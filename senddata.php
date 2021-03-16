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
    $insert = "INSERT INTO modules (module_cd, student_id, credit, mark) VALUES ('$module_cd', '$student_id',  '$credit', '$mark')";

    // Update query
    $update = "UPDATE modules SET credit = '$credit', mark = '$mark' WHERE student_id = '$student_id' and module_cd = '$module_cd'";

    // If statement
    if(mysqli_num_rows($result) == 0){
        mysqli_query($conn, $insert);
        echo "Records added successfully.";
    } else {
        mysqli_query($conn,$update);
        echo "Record updated correctly";
    }

    $uri = $_SERVER['HTTP_REFERER'];
    header("Location: ".$uri, true, 303);
    }
?>