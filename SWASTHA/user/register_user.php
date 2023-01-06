<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../Database/db.php';

    if (isset($_POST['submit'])) {

        $username = $_POST["username"];
        $user_id = $_POST["user_id"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $phonenumber = $_POST["phonenumber"];
        $email = $_POST["email"];


        $exist = "SELECT * FROM `users` WHERE username='$username'";
        $result = mysqli_query($con, $exist);
        $numExistsRow = mysqli_num_rows($result);
        if ($numExistsRow > 0) {
?>

            <script>
                alert("Username Exist..");
            </script>

            <?php
        } else {
            if ($password == $rpassword) {
                $sql1 = "INSERT INTO `users` (`username`,`user_id`,`password`,`register_time`) VALUES ('$username','$user_id','$password', current_timestamp())";
                $result1 = mysqli_query($con, $sql1);

                $sql2 = "SELECT user_id FROM `users` WHERE username='$username'";
                $result2 = mysqli_query($con, $sql2);

                $row = mysqli_fetch_array($result2);
                $user_id = $row['user_id'];

                $sql3 = "INSERT INTO `user_info` (`user_id`, `username`, `city`, `address`, `state`, `phonenumber`, `email`) VALUES ('$user_id', '$username', '$city', '$address', '$state', '$phonenumber', '$email')";
                $result3 = mysqli_query($con, $sql3);
                header("location: user_login.php");
            } else {
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
    <link rel="stylesheet" href="./css/user_register1.css">
    <title>User Registration</title>
</head>

<body>
    <div id="reg_user">
        <div class="container">
            <div class="modal modal-signin position-static d-flex  flex-row " tabindex="-1" role="dialog" id="modalSignin">
                <div class="modal-dialog" role="document">
                    <div class="modal-content rounded-5 shadow">
                        <div class="modal-header p-5 pb-4 border-bottom-0">
                            <h2 class="display-5 mb-0">Create an Account</h2>
                        </div>

                        <div class="modal-body p-5 pt-0">
                            <form class="form-group" action="register_user.php" method="post">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="username" name="username" placeholder="Enter Username">
                                    <label for="username">Enter UserName:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="user_id" name="user_id" placeholder="Enter User_ID">
                                    <label for="user_id">Enter User_ID:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control rounded-4" id="email" name="email" placeholder="Enter your Email">
                                    <label for="email">Enter your Email:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="phonenumber" name="phonenumber" placeholder="Contact">
                                    <label for="phonenumber">Contact:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="address" name="address" placeholder="Enter your Address">
                                    <label for="address">Enter your Address:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="city" name="city" placeholder="Enter your City">
                                    <label for="city">Enter your City:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-4" id="state" name="state" placeholder="Enter your State: ">
                                    <label for="state">Enter your State:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-4" id="password" name="password" placeholder="Password">
                                    <label for="password">Create Password:</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control rounded-4" id="rpassword" name="rpassword" placeholder="Password">
                                    <label for="rpassword">Confirm Password:</label>
                                </div>
                                <button class="w-100 mb-2 btn btn-lg rounded-4 btn-dark" name="submit" id="submit" type="submit">Register</button>
                                <small class="text-muted">By clicking <a href="../terms and conditions.html" class="term-service">Register,</a> you agree to the terms of use.</small>
                                <div class="display-7 mt-2">
                                    Go to <a href="../index.php" class="c">HOME</a>
                                </div>
                                <div class="display-7 mt-2">
                                    Already have an Account ? <a href="./user_login.php" class="loginhere-link">Login Here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>