<?php

session_start();

include '../Database/db.php';
$uname = ($_SESSION['username']);

$sql2 = "SELECT * FROM `hospitals` WHERE username='$uname'";
$result2 = mysqli_query($con, $sql2);
$row = mysqli_fetch_array($result2);
$hospital_id = ($row['hospital_id']);

$sql_temp = "SELECT * FROM `hospital_info` WHERE hospital_id='$hospital_id'";
$result_temp = mysqli_query($con, $sql_temp);
$row = mysqli_fetch_array($result_temp);

$beds = ($row["beds"]);
$available_bad = ($row["available_bad"]);
$Total_emergency_beds=($row["Total_emergency_beds"]);
$available_emergency_bad = ($row["available_emergency_bad"]);
$Total_icu_beds= ($row["Total_icu_beds"]);
$available_icu_beds = ($row["available_icu_beds"]);
$Total_general_beds= ($row["Total_general_beds"]);
$available_general_bad = ($row["available_general_bad"]);
$occupied = $beds - $available_bad;
$occupied_icu_beds = $Total_icu_beds - $available_icu_beds;
$occupied_emergency_beds = $Total_emergency_beds - $available_emergency_bad;
$occupied_general_beds = $Total_general_beds - $available_general_bad;

$hospital_name = ($row["hospital_name"]);
$address = ($row["address"]);
$city = ($row["city"]);
$state = ($row["state"]);
$pincode = ($row["pincode"]);
$phonenumber = ($row["phonenumber"]);
$email = ($row["email"]);
$website = ($row["website"]);

$last_updated = date("d/m/Y g:iA", strtotime($row["last_updated"]));

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['submit'])){
        
        $available_bad = $_POST["available_bad"];
        if($available_bad > $beds ){
        ?>
            <script>
                alert("You can't enter more than Total Beds")
                exit();
            </script>
        <?php
        }
        else{
            $sql3 = "UPDATE `hospital_info` SET `available_bad` = '$available_bad' WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
            $result3 = mysqli_query($con, $sql3);
            $sql7 = "UPDATE `hospital_info` SET `last_updated` = current_timestamp() WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
            $result7 = mysqli_query($con, $sql7);
            header("Refresh:0");
        }  
      }

      if(isset($_POST['submit1'])){

        $available_emergency_bad = $_POST["uemergency_beds"];
        if( $available_emergency_bad > $Total_emergency_beds){
        ?>
          <script>
              alert("You can't enter more than Total Emergency_beds Beds")
          </script>
        <?php
        }
        else{
            $sql4 = "UPDATE `hospital_info` SET `available_emergency_bad` = '$available_emergency_bad' WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
            $result4 = mysqli_query($con, $sql4);
            $sql8 = "UPDATE `hospital_info` SET `last_updated` = current_timestamp() WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
            $result8 = mysqli_query($con, $sql8);
            header("Refresh:0");
        }
      }
        
      if(isset($_POST['submit2'])){
          $available_icu_beds = $_POST["uicu_beds"];
            if( $available_icu_beds > $Total_icu_beds){
              ?>
                <script>
                    alert("You can't enter more than Total Beds")
                </script>
              <?php
            }
            else{
              $sql5 = "UPDATE `hospital_info` SET `available_icu_beds` = '$available_icu_beds' WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
              $result5 = mysqli_query($con, $sql5);
              $sql9 = "UPDATE `hospital_info` SET `last_updated` = current_timestamp() WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
              $result9 = mysqli_query($con, $sql9);
              header("Refresh:0");    
            }
        }
        if(isset($_POST['submit3'])){
          $available_general_bad = $_POST["ugeneral_beds"];
            if( $available_general_bad > $Total_general_beds){
              ?>
                <script>
                    alert("You can't enter more than Total Beds")
                </script>
              <?php
            }
          else{
              $sql6 = "UPDATE `hospital_info` SET `available_general_bad` = '$available_general_bad' WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
              $result6 = mysqli_query($con, $sql6);
              $sql10 = "UPDATE `hospital_info` SET `last_updated` = current_timestamp() WHERE `hospital_info`.`hospital_id` = '$hospital_id'";
              $result10 = mysqli_query($con, $sql10);
              header("Refresh:0");
            }
          }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="./css/welcome1.css"> -->
  <link rel="stylesheet" href="./css/hospital_navbar1.css">
  <script src="../js/bootstrap.bundle.min.js"></script>
  <title>
    Welcome <?php echo ($_SESSION['username']) ?>
  </title>
  <style>
    #info{
      font-size: 20px;
      font-family: times, "Times New Roman";
    }
  </style>
</head>
<body>
<?php
  include '../partials/hospital_navbar.php'
?>
<div class="bg-dark text-uppercase fw-bold text-light display-7">
    <marquee direction="left">
        <span> You Last Updated Details At <?php echo $last_updated ?>.</span>
    </marquee>
</div>
<div class="container mt-5">
<div>
<p class="h3">Hospital Name : <?php echo $hospital_name ?></p>
<div class="border border-dark border-2 p-4 w-25" id="info">
        <span>Address : <?php echo $address ?> </span><br>
        <span>City : <?php echo $city ?> </span> <br>
        <span>State :<?php echo $state ?> </span>  <br>
        <span>Pincode : <?php echo $pincode ?> </span><br>
        <span>phonenumber :<?php echo $phonenumber ?> </span><br> 
        <span>Email Id : <?php echo $email ?> </span> <br>
        <span>Website : <?php echo $website ?> </span> <br>
    </div>
</div>
<table class="table table-striped table-bordered table-hover mt-5 mb-5">
  <tr class="text-center  bg-dark text-light ">
    <th>Beds</th>
    <th>Total Beds</th>
    <th>Occupied Beds</th>
    <th>Available Beds</th>
    <th>Update Available Beds</th>
  </tr>
  <tr class="text-center">
    <td >Total Beds</td>
    <td><?php echo $beds; ?></td>
    <td><?php echo $occupied; ?> </td>
    <td><?php echo $available_bad; ?></td>
    <td> 
      <form  method="POST" accept="welcome.php">
        <input type="text" autocomplete="off" class="ms-5" name="available_bad" id="available_bad" placeholder="Update Available Beds">
        <span><button class="btn btn-dark" type="submit" name="submit" id="submit">Update</button></span>
    </form>
  </td>
  </tr>

  <tr class="text-center">
    <td>ICU Beds</td>
    <td> <?php echo $Total_icu_beds; ?></td>
    <td><?php echo $occupied_icu_beds; ?> </td>
    <td><?php echo $available_icu_beds; ?></td>
    <td> 
      <form  method="POST" accept="welcome.php">
        <input type="text" autocomplete="off" class="ms-5" name="uicu_beds" id="uicu_beds" placeholder="Update ICU Beds">
        <span><button class="btn btn-dark" type="submit"  name="submit2" id="submit2" >Update</button></span>
    </form>
  </td>
  </tr>

  <tr class="text-center">
    <td>Emergency Beds</td>
    <td><?php echo $Total_emergency_beds; ?> </td>
    <td><?php echo $occupied_emergency_beds; ?>  </td>
    <td><?php echo $available_emergency_bad; ?></td>
    <td> 
      <form  method="POST" accept="welcome.php">
        <input type="text" autocomplete="off" class="ms-5" name="uemergency_beds" id="uemergency_beds" placeholder="Update Emergency Beds">
        <span><button class="btn btn-dark" type="submit" name="submit1" id="submit1">Update</button></span>
    </form>
  </td>
  </tr>

  <tr class="text-center">
    <td>General Beds</td>
    <td><?php echo $Total_general_beds; ?></td>
    <td><?php echo $occupied_general_beds; ?> </td>
    <td><?php echo $available_general_bad; ?></td>
    <td> 
      <form  method="POST" accept="welcome.php">
        <input type="text" autocomplete="off" class="ms-5" name="ugeneral_beds" id="ugeneral_beds"  placeholder="Update Available Beds">
        <span><button class="btn btn-dark" type="submit"  name="submit3" id="submit3">Update</button></span>
    </form>
  </td>
  </tr>
</table>
</div>
<?php
  include "../partials/hospital_fotter.php"
  ?>
</body>
</html>