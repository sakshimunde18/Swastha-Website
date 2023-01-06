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
    <title>Hospitals</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/user1.css">
</head>
<body>
<?php
 include './partials/nav2.php'
?>
    <div class="container">
    <h1 class="display-5 fw-bold mt-4">Users</h1>
    <table id="myTable" class="table  table-striped table-bordered border-secondary table-hover border-4 mt-5">
        <thead  class="tableHead bg-dark text-light">
          <tr>
            <th>Sr. No</th>
            <th>User Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Contact</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `user_info`";
                $result = mysqli_query($con, $sql);
                $sn = 0;
                $delete;
                while($row = mysqli_fetch_assoc($result)){
                    $sn = $sn + 1;
                    echo "<tr>
                        <td>" . $sn . "</td>
                        <td>" . $row['username'] ."</td> 
                        <td>" . $row['address'] . "</td>
                        <td>" . $row['city'] . "</td>
                        <td>" . $row['state'] . "</td>
                        <td>" . $row['phonenumber'] . "</td>
                        <td><a class='btn btn-danger' href='delete_user.php?id=".$row['user_id']."'>"."delete"."</a></td>
                    </tr>";
                }
              ?>
        </tbody>
    </table>
</div>
</body>