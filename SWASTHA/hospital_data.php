<?php
include './Database/db.php';

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
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/hosp_data.css">
</head>

<body>
  <?php
  include "./partials/navbar3.php"
  ?>
  <div id="update">
    <marquee direction="left">
      <span>Last Updated :<?php echo $hospital_last_Updated ?></span>
    </marquee>
  </div>
  <div class="container">
    <div class="text-center">
      <h1><?php echo $hospital_name ?></h1>
    </div>

    <div class="row">
      <div class="column-lg">
        <div class="card border-dark border-2 ">
          <div class="card-body">
            <h3 class="card-title text-center">Hospital Details</h3>
            <h5 class="card-title">Hospital ID : <?php echo $hospital_id ?></h5>
            <p class="card-text">City :<?php echo $hospital_city ?></p>
            <p class="card-text">State :<?php echo $hospital_state ?></p>
            <p class="card-text">Pincode :<?php echo $hospital_pincode ?></p>
            <p class="card-text">Helpline Number :<?php echo $hospital_contact ?></p>
            <p class="card-text">Email :<?php echo $hospital_email ?></p>
            <p class="card-text">Website :<?php echo $hospital_website ?></p>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-5 mb-5">
        <div class="card border-dark border-2">
          <div class="card-body">
            <h4 class="card-title">Total Beds:- </h4>
            <p class="card-text">Total Beds :<?php echo $hospital_Total_beds ?></p>
            <p class="card-text">Total Available Beds :<?php echo $hospital_Total_available_beds ?></p>
            <p class="card-text">Total Occupied Beds :<?php echo $hospital_Total_occupied_beds ?></p>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-5 mb-5">
        <div class="card border-dark border-2">
          <div class="card-body">
            <h4 class="card-title">Total Emergency Beds:- </h4>
            <p class="card-text">Total Emergency Beds :<?php echo $hospital_Total_emergency_beds ?></p>
            <p class="card-text">Total Available Emergency Beds :<?php echo $hospital_Total_available_emergency_beds ?></p>
            <p class="card-text">Total Occupied Emergency Beds :<?php echo $hospital_occupied_Emergency_beds ?></p>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-5 mb-5">
        <div class="card border-dark border-2">
          <div class="card-body">
            <h4 class="card-title">Total ICU Beds:- </h4>
            <p class="card-text">Total ICU Beds :<?php echo $hospital_Total_icu_beds ?></p>
            <p class="card-text">Total Available ICU Beds :<?php echo $hospital_Total_available_icu_beds ?></p>
            <p class="card-text">Total Occupied ICU Beds :<?php echo $hospital_occupied_icu_beds ?></p>
          </div>
        </div>
      </div>

      <div class="col-sm-3 mt-5 mb-5">
        <div class="card border-dark border-2">
          <div class="card-body">
            <h4 class="card-title">Total General Beds:- </h4>
            <p class="card-text">Total General Beds :<?php echo $hospital_Total_general_beds ?></p>
            <p class="card-text">Total Available General Beds :<?php echo $hospital_Total_available_general_beds ?></p>
            <p class="card-text">Total Occupied General Beds :<?php echo $hospital_occupied_general_beds ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

    <?php
    include "./partials/footer.php";
    ?>
</body>

</html>