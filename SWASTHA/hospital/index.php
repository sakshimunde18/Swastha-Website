<?php

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/db.php';

    if(isset($_POST['submit'])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql1 = "SELECT `status` FROM `hospitals` WHERE `username`='$username'";
        $result1 = mysqli_query($con, $sql1);
        $row = mysqli_fetch_assoc($result1);

            $sql = "SELECT * FROM `hospitals` WHERE `username`='$username' and `status`='active'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);

            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    if($password == $row['password']){
                        $_SESSION['username'] = $username;
                        header("location: welcome.php");
                    }
                    else{
                        ?>
                        <script>
                          alert("Invalid Credentials.")
                        </script>
                        <?php
                    }
                }
            }
            else{
                ?>
                <script>
                  alert("Invalid Credentials.")
                </script>
                <?php
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
    <link rel="stylesheet" href="./css/hospital_login1.css">
    <title>Document</title>
</head>
<body>
    <div id="login">
    <div class="container">
    <div class="text-center">
    <form action="index.php" method="post">
        <h3>Login</h3>
        <div>
            <input type="text"  name="username" id="username" placeholder="Username"/>
        </div>
        <div >
            <input type="password" name="password" id="password" placeholder="Password"/>
        </div>
        <div>
            <input type="submit" name="submit" id="submit"  value="Login"/>
        </div>
        <p >
            Don't have an account ? <a href="Register.php">Register here</a>
        </p>
    </form>
    </div>
    </div>
    </div>
</body>
</html>