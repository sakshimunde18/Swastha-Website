<?php
 if($_SERVER["REQUEST_METHOD"] == "POST"){

    include '../Database/db.php';

    if(isset($_POST["submit"])){

        $username = $_POST["username"];
        $user_id = $_POST["user_id"];
        $password = $_POST["password"];
        $rpassword = $_POST["rpassword"];

        
        $exist = "SELECT * FROM `admin` WHERE username='$username'";
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
                $sql1 = "INSERT INTO `admin` (`username`,`user_id`,`password`,`register_time`) VALUES ('$username','$user_id','$password', current_timestamp())";
                $result1 = mysqli_query($con, $sql1);

                $sql2 = "SELECT user_id FROM `admin` WHERE username='$username'";
                $result2 = mysqli_query($con, $sql2);

                header("location:login.php");
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
    <title>Register Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/register1.css">
</head>
<body>
    <div id="reg">
    <div class="container">
        <div class="">
        <h2 class="text-center">Admin Register</h2>
        <form class="form-group" action="register.php" method="post">
            <div>
            <label for="username">UserName:</label>
                <input type="text" id="username" name="username" placeholder="Enter your Username">
            </div>
            <div>
            <label for="user_id">Admin_ID:</label>
                <input type="text" id="user_id" name="user_id" placeholder="Enter Amin_ID">
            </div>
            <div>
            <div>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your Password">
            </div>
            <div>
                <label for="rpassword">Confirm Password:</label>
                <input type="password" id="rpassword" name="rpassword" placeholder="Confirm your Password">
            </div>
            <div>
                <input  type="submit" name="submit" id="submit" class="form-submit" value="Register"/>
            </div>
            <div>
                <p id="p">
                    Already have an account ? <a href="./login.php">Login here</a>
                </p>
            </div>
        </form>    
        </div>    

</body>
</html>