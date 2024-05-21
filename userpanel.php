<?php
session_start();

if(!isset($_SESSION['user']))
  
  
include 'db_conn.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<style>
  .sidebar {
      background-color: #333;
      color: white;
      height: 100vh; /* Full height */
    }

    .content {
      padding: 20px;
  }

  .custom-img{
    max-width: 100px; 
    height: auto;


  }

   
  .nav-item:hover {
      transform: scale(1.05);
    }
</style>
<body>
    <div class="row">
      <!-- Sidebar -->

      <div class="col-md-3 sidebar bg-secondary text-center">
<div class="container-fluid pb-4">
    <h2 class="p-3 border bg-light text-dark">User Account</h2>
</div>
       
      <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link  text-white active" href="userpanel.php">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  text-white" href="usercard.php">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  text-white" href="index.php">Category</a>
    </li>
  </ul>
</div>


      <!-- Main Content -->
      <div class="col-md-9 content">
        
        <div class="container">
           <div class="button float-end">
            <a href="index.php" class="btn btn-primary">Logout</a>
          </div>

        <div class="row">

            <div class="col-sm-3">
                <div class="card custom-card">
                  <a href="#">
                   <img src="images/upro.png" alt="user" class="custom-img rounded mx-auto d-block">
                  </a>
                  <div class="card-body  mx-auto d-block">
                    <h5 class="card-title">Hi! User</h5>
                    <p class="card-text"></p>
                     <a href="usercard.php" class="btn btn-primary">Users</a>
                  </div>
                </div>
                 </div>

                      <div class="col-sm-3">
                    <div class="card custom-card">
                      <a href="#">
                       <img src="images/profile.jpg" alt="user" class="custom-img rounded mx-auto d-block">
                      </a>
                      <div class="card-body  mx-auto d-block">
                        <h5 class="card-title">Hi! User</h5>
                        <p class="card-text"></p>
                         <a href="usertake.php" class="btn btn-primary">Users</a>
                      </div>
                    </div>
                     </div>



  </div>
</div>

      </div>
    </div>



</body>
</html>
