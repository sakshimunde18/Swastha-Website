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
        if($row['status']=='inactive'){
            ?>
            <script>
              alert("Account is inactive..")
            </script>
            <?php
        }
        else{
            $sql = "SELECT * FROM `users` WHERE `username`='$username'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);

            if($num == 1){
                while($row = mysqli_fetch_assoc($result)){
                    if($password == $row['password']){
                        $_SESSION['username'] = $username;
                        header("location: user_index.php");
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
}
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/user_login.css">
    <title>User Login</title>
</head>
<body>
<div class="modal modal-signin position-static d-block py-5" tabindex="-1" role="dialog" id="modalSignin">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow bg-dark">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <h2 class="display-5 mb-0 text-light">Login Here</h2>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="form-group" action="user_login.php" method="post">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="username" name="username" placeholder="Enter Username">
            <label for="username">Enter UserName:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control rounded-4"  id="password" name="password" placeholder="Enter password">
            <label for="password">Enter your Password:</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-light"  name="submit" id="submit" type="submit">Sign up</button>
    
          <div class="display-7 mt-2 text-light">
          Go to <a href="../index.php" class="c">HOME</a>
          </div> 
          <div class="display-7 mt-2 text-light">
          Dont have an Account ? <a href="./register_user.php" class="loginhere-link">Register Here</a>
          </div> 
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>