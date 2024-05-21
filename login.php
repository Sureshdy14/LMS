<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username= $_POST['username'];
    $pass = $_POST['password'];

// SQL query to check if username and password match
$query = "SELECT * FROM users WHERE username='$username' AND password='$pass'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$_SESSION["type"] = $row['admin'];
$_SESSION["id"] = $row['id'];
$_SESSION["name"] = $row['username'];


if ($row["type"] == 'admin') {
    header("Location: admin.php");
} else {
    if ($row["type"] == 'user') {
        header("Location: userpanel.php");
    } else {
        echo "Error: Access Denied"; // Display error message for non-registered users
        // You may also consider redirecting them to a login page or another appropriate action
    }
}


}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 100px;
        }
        .btn{
            float:right;
        }
    </style>
</head>
<body>
    <div class="container">
        <br><br>
        <div class="button float-end">
            <a href="index.php" class="btn btn-secondary"><-Back</a>
          </div>

        <div class="row justify-content-center">

            <div class="col-md-6 login-container">
                <div class="card">

                    <div class="card-header">

                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                        <form action="login.php" method="POST">
                            <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="text" class="form-control"  id="username" name="username" placeholder="Enter username"  oninput="validateInput(username)">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="btn">
                                <button type="submit" value="Login" class="btn btn-primary">Login</button><br><br>
                                Not registered yet? <a href="register.php" class="text-white btn btn-primary">Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
             function validateInput(username) {
    var input = event.target.value;
    var alpha = /^[a-zA-Z\s]*$/; // Regular expression to match only letters and spaces
    
    if (!alpha.test(input) || input.length > 20) {
        event.target.value = ''; 
        // Show a popup error message using alert
        alert('Error: Input must contain only letters and spaces and should be less than or equal to 20 characters.');
    }
}
    </script>
</body>
</html>
