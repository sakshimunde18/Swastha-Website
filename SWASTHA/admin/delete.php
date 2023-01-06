<?php
    include '../Database/db.php';

    $id = $_GET['id'];

    $sql = "DELETE FROM hospital_info WHERE hospital_id = $id"; 
    $result = mysqli_query($con, $sql);

    $sql2 = "DELETE FROM hospitals WHERE hospital_id = $id"; 
    $result2 = mysqli_query($con, $sql2);

    if (mysqli_query($con, $sql)) {
            mysqli_close($con);
            header('Location: hospital.php'); 
            exit;
    }
    else{
        echo "Error deleting record";
    }
?>
