<?php
session_start();

include '../Database/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/user_style1.css">

  <script src="../js/search.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <title>
    Welcome
  </title>
</head>

<body>
  <?php
  include "../partials/user_navbar.php"
  ?>
  <div class="container my-5" style="max-width: 1350px;">
    <span class="display-3">Hospitals</span>
    <div class="d-flex justify-content-center align-items-center">
      <div class="col"></div>
      <form action="user_index.php" method="get">
        <div class="input-group ">
          <input type="search" class="form-control rounded floatingInput" placeholder="Search for Hospitals" aria-label="Search" aria-describedby="search-addon" id="myInput" name="search" <?php if (isset($_GET["search"])) {
                                                                                                                                                                                              echo $_GET["search"];                                                                                                                                                                                   } ?> />
          <button type="submit" class="btn btn-outline-dark" id="search">Search</button>
        </div>
      </form>
    </div>
    <table id="myTable" class="table  table-striped table-bordered border-secondary table-hover border-4 mt-5">
    <thead class="tableHead bg-dark text-light">
        <tr>
          <th>Sr. No</th>
          <th>Hospital Name</th>
          <th>Address</th>
          <th>City</th>
          <th>State</th>
          <th>Pincode</th>
          <th>Emergency No</th>
          <th>Total Beds</th>
          <th>Available Beds</th>
          <th>Last Updated</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (isset($_GET['search'])) {
          $searchq = $_GET['search'];
          $query = "SELECT * FROM `hospital_info` WHERE CONCAT(hospital_name,category,city,state) LIKE '%$searchq%'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {
            foreach ($count as $items) {
        ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit2'])) {
          $searchq = 'Emeargency';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit3'])) {
          $searchq = 'Multispeciality';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit4'])) {
          $searchq = 'Obstetrics_and_Gynecology';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit5'])) {
          $searchq = 'Cardiologist';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit6'])) {
          $searchq = 'Neurologist';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
            <?php
          }
        } else if (isset($_POST['submit7'])) {
          $searchq = 'Physiotherapy';
          $query = "SELECT * FROM `hospital_info` WHERE category = '$searchq'";
          $count = mysqli_query($con, $query);
          if (mysqli_num_rows($count) > 0) {

            foreach ($count as $items) {
            ?>
              <tr>
                <td><?= $items['sr']; ?></td>
                <td><?= $items['hospital_name']; ?></td>
                <td><?= $items['address']; ?></td>
                <td><?= $items['city']; ?></td>
                <td><?= $items['state']; ?></td>
                <td><?= $items['pincode']; ?></td>
                <td><?= $items['phonenumber']; ?></td>
                <td><?= $items['beds']; ?></td>
                <td><?= $items['available_bad']; ?></td>
                <td><?= $items['last_updated']; ?></td>
              </tr>
            <?php
            }
          } else {
            ?>
            <tr>
              <td>No Records Found</td>
            </tr>
        <?php
          }
        } else {
          $sql = "SELECT * FROM `hospital_info`";
          $result = mysqli_query($con, $sql);
          $sn = 0;
          while ($row = mysqli_fetch_assoc($result)) {
            $sn = $sn + 1;
            echo "<tr>
                <td>" . $sn . "</td>
                <td><a href ='./hospital_data.php?id=" . $row['hospital_name'] . "'>" . $row['hospital_name'] . "</a></td> 
                <td>" . $row['address'] . "</td>
                <td>" . $row['city'] . "</td>
                <td>" . $row['state'] . "</td>
                <td>" . $row['pincode'] . "</td>
                <td><ul><li>" . $row['phonenumber'] . "</li><li>" . $row['email'] . "</li><li>" . $row['website'] . "</li></ul></td>
                <td>" . $row['beds'] . "</td>
                <td>" . $row['available_bad'] . "</td>
                <td>" . $row['last_updated'] . "</td>
              </tr>";
          }
        }
        ?>
      </tbody>
    </table>
  </div>
  <?php
  include "../partials/user_footer.php"
  ?>
</body>

</html>