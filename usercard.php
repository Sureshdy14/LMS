<?php
session_start();
// Check if user is not logged in as admin, redirect to login page
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}


include 'db_conn.php';
$call = $_SESSION['id'];

  $sql = "SELECT * FROM users" ;
  $result = mysqli_query($conn,$sql);
        
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile Card</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-card {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .profile-picture {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
 



 <div class="container mt-5">
  <div class="button float-end">
            <a href="userpanel.php" class="btn btn-secondary"><-Back</a>
          </div>
    <div class="row justify-content-center">
       <?php
     include "db_conn.php";

      $sql = "SELECT * FROM users where id= $call";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
      <div class="col-md-6">
        <div class="profile-card text-center">
          <img src="images/upro.png" alt="Profile Picture" class="profile-picture">
          <h3 class="mb-3"> <?php echo $row['username'] ?></h3>
          <p class="text-muted">Library User</p>
          <p>"Organizing knowledge is the key to unlocking its potential."</p>
          <ul class="list-unstyled">
            <li>User Name: <?php echo $row['username'] ?></li>
            <li>Password: <?php echo $row['password'] ?></li>
             <li>Email:<?php echo $row['email'] ?></li>
              <li>Phone Number:<?php echo $row['phonenumber'] ?></li>
               <li>Date of Birth:<?php echo $row['dob'] ?></li>
                <li>Gender:<?php echo $row['gender'] ?></li>
                 <li>Address:<?php echo $row['address'] ?></li>
          
          </ul>
          
        </div>



<?php

    }

    ?>
      </div>

    </div>
  </div>



  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
  <!-- Bootstrap Icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.js"></script>
</body>
</html>
