<?php
    include '../Database/db.php';

    $id = $_GET['id'];

    $sql = "SELECT * FROM hospital_info WHERE hospital_name = '$id'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $hospital_name = ($row['hospital_name']);
    $hospital_id = ($row['hospital_id']);
    $hospital_city = ($row['city']);
    $hospital_state = ($row['state']);
    $hospital_pincode = ($row['pincode']);
    $hospital_contact = ($row['phonenumber']);
    $hospital_email = ($row['email']);
    $hospital_website = ($row['website']);
    $hospital_Total_beds = ($row['beds']);
    $hospital_Total_available_beds = ($row['available_bad']);
    $hospital_Total_emergency_beds = ($row['Total_emergency_beds']);
    $hospital_Total_available_emergency_beds = ($row['available_emergency_bad']);
    $hospital_Total_icu_beds = ($row['Total_icu_beds']);
    $hospital_Total_available_icu_beds = ($row['available_icu_beds']);
    $hospital_Total_general_beds = ($row['Total_general_beds']);
    $hospital_Total_available_general_beds = ($row['available_general_bad']);
    $hospital_last_Updated = ($row['last_updated']);

    $hospital_Total_occupied_beds = $hospital_Total_beds - $hospital_Total_available_beds;
    $hospital_occupied_Emergency_beds = $hospital_Total_emergency_beds - $hospital_Total_available_emergency_beds;
    $hospital_occupied_icu_beds = $hospital_Total_icu_beds - $hospital_Total_available_icu_beds;
    $hospital_occupied_general_beds = $hospital_Total_general_beds - $hospital_Total_available_general_beds

?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $hospital_name ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/user_hospital_navbar1.css">
</head>
<body>
<?php
  include "../partials/user_hospital_navbar.php"
?>
<Div class="container">
    <div>
        <h1><?php $echohospital_name?></h1>
    </div>
    <div>
        <p>Last Updated :<?php echo $hospital_last_Updated ?></p>
    </div>
    <div>
        <p><?php echo $hospital_name ?>Details</p>
        <p>Hospital ID :<?php echo $hospital_id ?></p>
        <p>City :<?php echo $hospital_city ?></p>
        <p>State :<?php echo $hospital_state ?></p>
        <p>Pincode :<?php echo $hospital_pincode ?></p>
        <p>Helpline Number :<?php echo $hospital_contact ?></p>
        <p>Email :<?php echo $hospital_email ?></p>
        <p>Website :<?php echo $hospital_website ?></p>
    </div>
    <div>
        <span>Total Beds :<?php echo $hospital_Total_beds ?></span>
        <span>Total Available Beds :<?php echo $hospital_Total_available_beds ?></span>
        <span>Total Occupied Beds :<?php echo $hospital_Total_occupied_beds ?></span>
    </div>
    <div>
        <span>Total Emergency Beds :<?php echo $hospital_Total_emergency_beds ?></span>
        <span>Total Available Emergency Beds :<?php echo $hospital_Total_available_emergency_beds ?></span>
        <span>Total Occupied Emergency Beds :<?php echo $hospital_occupied_Emergency_beds ?></span>
    </div>
    <div>
        <span>Total ICU Beds :<?php echo $hospital_Total_icu_beds ?></span>
        <span>Total Available ICU Beds :<?php echo $hospital_Total_available_icu_beds ?></span>
        <span>Total Occupied ICU Beds :<?php echo $hospital_occupied_icu_beds ?></span>
    </div>
    <div>
        <span>Total General Beds :<?php echo $hospital_Total_general_beds ?></span>
        <span>Total Available General Beds :<?php echo $hospital_Total_available_general_beds ?></span>
        <span>Total Occupied General Beds :<?php echo $hospital_occupied_general_beds ?></span>
    </div>

</div>
<?php
  include "../partials/user_footer.php"
?>
</body>
</html>