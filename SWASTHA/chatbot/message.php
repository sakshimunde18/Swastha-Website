<?php
include "../Database/db.php";

$getMesg = mysqli_real_escape_string($con, $_POST['text']);

$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($con, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){

    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "sorry, I Don't understand";
}

?>