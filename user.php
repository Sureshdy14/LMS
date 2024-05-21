<?php
session_start();

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// If user is logged in, display welcome message
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    
    h1{
        color: blue;
        font-family: sans-serif;
        font-size: 40px;
    
    }
    p{
        color:black;
        font-family: sans-serif;
        font-size: 20px;
    }
    .welcome-container{
        text-align: center;

    }
</style>
<body>
    <div class="welcome-container">
        <h1>Welcome, <?php echo $username; ?>!</h1>
        <p>Haii, Welcome  user page </p>
    </div>
</body>
</html>
