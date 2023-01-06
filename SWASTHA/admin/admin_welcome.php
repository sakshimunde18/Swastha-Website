<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Welcome <?php echo ($_SESSION['username']) ?></title>
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/welcome.css">
</head>

<body>
  <?php
  include "./partials/nav.php"
  ?>

  <div class="container px-4 py-5" id="hanging-icons">
  <h1 class="display-5 fw-bold mt-4">Details</h1>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em">
            <use xlink:href="#toggles2" />
          </svg>
        </div>
        <div>
        <h1 class="display-5 fw-bold mt-4">Hospitals</h1>
          <p>Details of Hospitals..... For Delete And Update all the information of registered Hospitals</p>
          <a href="hospital.php" class="btn btn-primary">
          Hospitals
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div class="icon-square bg-light text-dark flex-shrink-0 me-3">
          <svg class="bi" width="1em" height="1em">
            <use xlink:href="#tools" />
          </svg>
        </div>
        <div>
        <h1 class="display-5 fw-bold mt-4">Users</h1>
          <p>Details of Users..... For Delete And Update all the information of registered Users</p>
          <a href="user.php" class="btn btn-primary">
          Users Info
          </a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>