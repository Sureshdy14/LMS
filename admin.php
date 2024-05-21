<?php
session_start();
// Check if user is not logged in as admin, redirect to login page
if (!isset($_SESSION['admin'])){
  
  
}

  // Connect to your database (replace the parameters with your actual database credentials)
 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

  // user register table
  $query = "SELECT COUNT(id) AS id_count FROM users";
  $result = mysqli_query($conn, $query);

  // Fetch the count
  if ($row = mysqli_fetch_assoc($result)) {
    $idCount = $row['id_count'];
  } else {
    $idCount = 0;
  }

//admin add books table
 $query = "SELECT COUNT(book_name) id_book FROM crud";
  $result = mysqli_query($conn, $query);

  // Fetch the count
  if ($row = mysqli_fetch_assoc($result)) {
    $idbook = $row['id_book'];
  } else {
    $idbook = 0;
  }


//user book register details
$query = "SELECT COUNT(fullname) id_fullname FROM bookregister";
  $result = mysqli_query($conn, $query);

  // Fetch the count
  if ($row = mysqli_fetch_assoc($result)) {
    $idfullname = $row['id_fullname'];
  } else {
    $idfullname = 0;
  }



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
    <h2 class="p-3 border bg-light text-dark">Admin Panel</h2>
</div>


       
      <ul class="nav flex-column">
    <li class="nav-item">
      <a class="nav-link  text-white active" href="admin.php">Dashboard</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  text-white" href="userview.php">Users</a>
    </li>
    <li class="nav-item">
      <a class="nav-link  text-white" href="bookdetails.php">Category</a>
    </li>
  </ul>
</div>


      <!-- Main Content -->
      <div class="col-md-9 content">
        
        <div class="container">
           <div class="button float-end">
            <a href="index.php" class="btn btn-secondary">Logout</a>
          </div>

        <div class="row">

            <div class="col-sm-3">

              <div class="card custom-card">
        <a href="#">
         <img src="images/upro.png" alt="user" class="custom-img rounded mx-auto d-block">
        </a>
        <div class="card-body">
          <h5 class="card-title">User Register</h5>
          <p class="card-text">Users Registered: <?php echo $idCount; ?></p>
           <a href="userview.php" class="btn btn-primary">Users</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
              <div class="card custom-card">
        <a href="#">
         <img src="images/booklogo.png" alt="user" class="custom-img rounded mx-auto d-block">
        </a>
        <div class="card-body">
          <h5 class="card-title">Book Details</h5>
          <p class="card-text">Books Count:<?php echo $idbook; ?></p>
           <a href="bookdetails.php" class="btn btn-secondary">Books</a>
        </div>
      </div>
    </div>

     <div class="col-sm-3">
              <div class="card custom-card">
        <a href="#">
         <img src="images/book.png" alt="user" class="custom-img rounded mx-auto d-block">
        </a>
        <div class="card-body">
          <h5 class="card-title">User TakenBook</h5>
          <p class="card-text">Taken Count:<?php echo $idfullname; ?></p>
           <a href="takenbook.php" class="btn btn-success">Taken Book</a>
        </div>
      </div>
    </div>

  </div>
</div>

      </div>
    </div>
  </div>


</body>
</html>
