<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/db.php';

    if(isset($_POST['submit'])){

        $username = $_POST["username"];
        $password = $_POST["password"];
        $hospital_id = $_POST["hospital_id"];
        $rpassword = $_POST["rpassword"];
        $hospital_name = $_POST["hospital_name"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $pincode = $_POST["pincode"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];
        $category = $_POST["category"];
        $website = $_POST["website"];
        $beds = $_POST["beds"];
        $available_bad= $_POST["available_bad"];
        $Total_emergency_beds= $_POST["Total_emergency_beds"];
        $available_emergency_bad= $_POST["available_emergency_bad"];
        $Total_icu_beds= $_POST["Total_icu_beds"];
        $available_icu_beds= $_POST["available_icu_beds"];
        $Total_general_beds= $_POST["Total_general_beds"];
        $available_general_bad= $_POST["available_general_bad"];

        $exist = "SELECT * FROM `hospitals` WHERE username='$username'";
        $result = mysqli_query($con, $exist);
        $numExistsRow = mysqli_num_rows($result);
        if($numExistsRow > 0){
            ?>

            <script>
            alert("Username Exist..");
            </script>

            <?php            
        }
        else{
            if($password == $rpassword){
                $sql1 = "INSERT INTO `hospitals` (`username`,`hospital_id`,`password`, `register_time`, `status`) VALUES ('$username','$hospital_id', '$password', current_timestamp(), 'active')";
                $result1 = mysqli_query($con, $sql1);

                $sql2 = "SELECT hospital_id FROM `hospitals` WHERE username='$username'";
                $result2 = mysqli_query($con, $sql2);

                $row = mysqli_fetch_array($result2);
                $hospital_id = $row['hospital_id'];

                $sql3 = "INSERT INTO `hospital_info` (`hospital_id`, `hospital_name`, `city`, `address`, `state`, `pincode`, `phonenumber`, `email`,`category`, `website`, `beds`, `available_bad`,`Total_emergency_beds`,`available_emergency_bad`,`Total_icu_beds`,`available_icu_beds`,`Total_general_beds`,`available_general_bad`, `last_updated`) VALUES ('$hospital_id', '$hospital_name', '$city', '$address', '$state', '$pincode', '$phonenumber', '$email','$category', '$website', '$beds', '$available_bad','$Total_emergency_beds','$available_emergency_bad','$Total_icu_beds','$available_icu_beds','$Total_general_beds','$available_general_bad', current_timestamp())";
                $result3 = mysqli_query($con, $sql3);
                header("location: index.php");
            }
            else{
                ?>
                <script>
                alert("Password does not match..")
                </script>
                <?php
            }
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
    <link rel="stylesheet" href="./css/hospital_reg1.css">
    <title>Register</title>
</head>
<body id="hosp_reg">
    <div id="reg">
    <div class="container">
    <form  action="Register.php" method="post">
    <h1>Create Account</h1>
    <div>
        <label for="username">UserName: </label>
        <input type="text"id="username" name="username" placeholder="Enter your Username">
    </div>
    <div>
        <label for="hospital_id">Hospital_ID: </label>
        <input type="text"id="hospital_id" name="hospital_id" placeholder="Enter your hospital_id">
    </div>
    <div>
        <label for="hospital_name">Hospital Name: </label>
        <input type="text"id="hospital_name" name="hospital_name" placeholder="Enter your Hospital Name">
    </div>
    <div>
        <label for="address">Address: </label>
        <input type="text"id="address" name="address" placeholder="Enter Hospital Address">
    </div>
    <div>
    <div>
        <label for="city">City: </label>
        <input type="text"id="city" name="city" placeholder="Enter City">
    </div>
        <label for="state">State: </label>
        <input type="text"id="state" name="state" placeholder="Enter State">
    </div>
    <div>
        <label for="pincode">PinCode: </label>
        <input type="text"id="pincode" name="pincode" placeholder="Enter PinCode">
    </div>
    <div>
        <label for="phonenumber">Contact: </label>
        <input type="text"id="phonenumber" name="phonenumber" placeholder="Enter Contact Number">
    </div>
    <div>
        <label for="email">Email: </label>
        <input type="email" id="email" name="email" placeholder="Enter your Email">
    </div>
    <label id="category" for="category">Select Category: </label>
        <div>
        <label for="emergency">Emergency:</label>
        <input type="checkbox" name="category" value="emergency">
        
        <label for="Multispeciality">Multispeciality:</label>
        <input type="checkbox" name="category" value="Multispeciality">

        <label for="Obstetrics and Gynecology">Obstetrics and Gynecology:</label>
        <input type="checkbox" name="category" value="Obstetrics and Gynecology">

        <label for="Cardiologist">Cardiologist:</label>
        <input type="checkbox" name="category" value="Cardiologist">

        <label for="Neurologist">Neurologist:</label>
        <input type="checkbox" name="category" value="Neurologist">

        <label for="Physical therapy">Physical therapy:</label>
        <input type="checkbox" name="category" value="Physical therapy">
    </div>
    <div>
        <label for="website">Website: </label>
        <input type="text" id="website" name="website" placeholder="Enter hospital webiste">
    </div>
    <div>
        <label for="beds">Total Beds: </label>
        <input type="text" id="beds" name="beds" placeholder="Enter no. of total beds">
    </div>
    <div>
        <label for="available_bad" placeholder="No of beds">Available Beds: </label>
        <input type="text" id="available_bad" name="available_bad" placeholder="Enter no. of available beds">
    </div>
    <div>
        <label for="Total_emergency_beds">Total Emergency Beds: </label>
        <input type="text" id="Total_emergency_beds" name="Total_emergency_beds" placeholder="Enter no. of Emergency Beds">
    </div>
    <div>
        <label for="available_emergency_bad" placeholder="No of beds">Available Emergency Beds: </label>
        <input type="text" id="available_emergency_bad" name="available_emergency_bad" placeholder="Enter no. of Available Emergency beds">
    </div>
    <div>
        <label for="Total_icu_beds">Total ICU Beds: </label>
        <input type="text" id="Total_icu_beds" name="Total_icu_beds" placeholder="Enter no. of ICU Beds">
    </div>
    <div>
        <label for="available_icu_bad" placeholder="No of beds">Available ICU Beds: </label>
        <input type="text" id="available_icu_beds" name="available_icu_beds" placeholder="Enter no. of Available ICU beds">
    </div>
    <div>
        <label for="Total_general_beds">General Beds: </label>
        <input type="text" id="Total_general_beds" name="Total_general_beds" placeholder="Enter no. of General Beds">
    </div>
    <div>
        <label for="available_general_bad" placeholder="No of beds">Available General Beds: </label>
        <input type="text" id="available_general_bad" name="available_general_bad" placeholder="Enter no. of available general beds">
    </div>
    <div>
        <label for="password" placeholder="Password">Password: </label>
        <input type="password" id="password" name="password" placeholder="Set password">
    </div>
    <div>
        <label for="rpassword" placeholder="repat your password">Confirm Password:</label>
        <input type="password" id="rpassword" name="rpassword" placeholder="Confirm your password">
    </div>
    <div>
        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="../terms and conditions.html" class="term-service">Terms and Conditions</a></label>
    </div>
    <div>
        <input type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
    </div>
    </form>
    <p class="loginhere">
        Already have an Account ? <a href="index.php" class="loginhere-link">Login Here</a>
    </p>
    <p>
        Go to <a href="../index.php" class="loginhere-link">HOME</a>
    </p>
    </div>
    </div>
</body>
</html>