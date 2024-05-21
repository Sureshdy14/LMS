<?php
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

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $co_password = $_POST['co_password'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $type = "user";
    $address = $_POST['address'];

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error = 'Username already exists!';
    } else {
        if ($pass != $co_password) {
            $error = 'Passwords do not match!';
        } else {
            // Insert new user into the database
            $sql = "INSERT INTO users (username, password, email, phonenumber, dob, gender,type, address) 
            VALUES ('$username', '$pass', '$email', '$phonenumber', '$dob', '$gender','$type','$address')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Registration Successful!');</script>";
                header("Location: login.php"); // Assuming your login page is named login.php
                exit;
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="script.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .registration-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

      <div class="d-flex justify-content-end">
    <a href="login.php" class="btn btn-secondary"><-Back</a>
</div>


    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-6">
                <div class="registration-container">
                    <h2>Registration Form</h2>
                    <?php if(isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Username" oninput="validateInput(username)" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="co_password" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" oninput="validateEmail(email)" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" id="phonenumber" name="phonenumber" pattern="[0-9]{10}" maxlength="10" placeholder="Phone Number" id="phonenumber" maxlength="10" required>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender:</label><br>
                            <input type="radio" name="gender" value="Male" required> Male
                            <input type="radio" name="gender" value="Female" required> Female
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="address" placeholder="Address" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Register</button>
                            <a href="login.php" class="btn btn-secondary">Login</a>
                        </div>
                    </form>
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



function validateEmail(email) {
    // Regular expression to validate email
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    // Check if email matches the regex pattern
    if (emailRegex.test(email)) {
        return true;
    } else {
        
        return false; // Return false to indicate validation failure
    }
}

document.querySelector('#phonenumber').addEventListener('input', function() {
  // Remove any non-numeric characters
  this.value = this.value.replace(/\D/g, '');

  // Ensure the length is not more than 10 digits
  if (this.value.length > 10) {
    this.value = this.value.slice(0, 10);
  }
});
    </script>
</body>
</html>
