<?php

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '../Database/db.php';

    if(isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM `admin` WHERE `username`='$username'";
        $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);

            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    if($password == $row['password']){
                        $_SESSION['username'] = $username;
                        header("location:admin_welcome.php");
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
    <title>Login Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login1.css">
</head>
<body>
    <div id="login">
    <div class="container">
        <div class="text-center">
        <form action="login.php" method="post">
                <h2>Login</h2>
                <div>
                    <input type="text" id="username" name="username" placeholder="Enter username">
                </div>
                <div>
                    <input type="password" id="password" name="password" placeholder="Enter password">
                </div>
                <div>
                    <input type="submit" id="submit" name ="submit" value="Login">
                </div>
                <div>
                <p id="p">
                     Don't have an account ? <a href="./register.php">Register here</a>
                </p>
                </div>
        </form>  
        </div>      
    </div>
    </div>
</body>
</html>