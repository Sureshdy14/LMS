<?php
include 'db_conn.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $msg = $_POST['msg'];
    

            // Insert new user into the database
            $sql = "INSERT INTO contactus (fname, lname, email, msg) 
            VALUES ('$fname', '$lname', '$email', '$msg')";

            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Our Team will Contact you Soon!');</script>";
               
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
    }
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Bootstrap CSS -->
    <link href= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet"> 
    
    <!-- Font Awesome -->
    <link href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
          rel="stylesheet"> 
    
    <!-- Bootstrap Bundle with Popper -->
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"> 
    </script> 
	<!---->
	<title>contact</title>
    
   
</head>
<style>





        
 
        .footer-content h2 { 
            color: #fff; 
        } 
  
        .footer-content h5, 
        .footer-content p, 
        .footer-links a { 
            color: #fff; 
        } 
  
        .footer-links a:hover { 
            text-decoration: underline; 
        } 
  
        .footer hr { 
            background-color: #fff; 
        } 
</style>
<body>
  <div>
    <?php
include 'header.php';

?>

  </div>

 <div class="container-fluid">
    <div class="row">
      <!-- Left Section -->
      <div class="col-md-6">
         <h1>Google Map</h1>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d16001.125788369913!2d80.25717193608979!3d13.0737389986059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a52660ef39b8afb%3A0x9507fa7b131c1c36!2sGovernment%20Museum%20Chennai!5e0!3m2!1sen!2sin!4v1710821463489!5m2!1sen!2sin" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <!-- Right Section -->
      <div class="col-md-6 ">
       <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="width:600px; height: 500px;" id="myForm">
  <div class="row mb-3">
          <h2>Contact Us </h2>
          <div class="col">
            <label class="form-label">First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First Name" oninput="validateInput(fname)" required>
          </div>
          <div class="col">
            <label class="form-label">Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last Name" oninput="validateInput(lname)" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email" oninput="validateEmail(email)" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Message</label>
             <textarea id="msg" name="msg" rows="4" cols="50" class="form-control">Message Here...</textarea>
          </div>

          <div>
            <button type="submit" class="btn btn-success" name="submit" float-end>Save</button>
            <a href="contact.php" type="reset" class="btn btn-danger" id="cancelBtn">Cancel</a>
          </div>
          
        </div>

</form>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <br>
 <div class="container-fluid py-5 bg-secondary text-white">
     <div class="row">

                <div class="col-md-3">

                    <h2>Library</h2> 
                </div> 
                <div class="col-md-3"> 
                    <h5>About Us</h5> 
                    <p> 
                        They provide countless resources, such as educational materials, trainings, courses, scientific publications, etc. to visitors. Public libraries provide their services not only face-to-face, but some of them have also integrated e-learning.
                    </p> 
                </div> 
                <div class="col-md-3"> 
                    <h5>Contact Us</h5> 
                    <ul class="list-unstyled"> 
                        <li>Email: library@example.com</li> 
                        <li>Phone: 91+ 456327894</li> 
                        <li>Address: 234 chennai</li> 
                    </ul> 
                </div> 
                <div class="col-md-3"> 
                    <h5>Follow Us</h5> 
                    <ul class="list-inline footer-links"> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-facebook"></i> 
                          </a> 
                          </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-twitter"></i> 
                          </a> 
                        </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-instagram"></i> 
                          </a> 
                        </li> 
                        <li class="list-inline-item"> 
                          <a href="#"> 
                                <i class="fab fa-linkedin"></i> 
                          </a> 
                        </li> 
                    </ul> 
                </div> 
            </div>

            <hr> 
            <div class="row"> 
                <div class="col-md-6"> 
                    <p>© 2024 Your Website.</p> 
                </div> 
                <div class="col-md-6 text-end"> 
                    <ul class="list-inline footer-links"> 
                        <li class="list-inline-item"> 
                            <a href="#" class="text-white"> 
                                Privacy Policy 
                            </a> 
                        </li> 
                        <li class="list-inline-item"> 
                            <a href="#" class="text-white"> 
                                Terms of Service 
                            </a> 
                        </li> 
                        <li class="list-inline-item"> 
                            <a href="#" class="text-white"> 
                                Sitemap 
                            </a> 
                        </li> 
                    </ul> 
                </div> 
            </div> 
    </div>

  </footer>





<!--bootstrap5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


 <!-- jQuery (necessary for Bootstrap's JavaScript plugins)cancel form data -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
     $(document).ready(function(){
      $('#cancelBtn').click(function(){
        $('#myForm')[0].reset(); // Reset form
      });
    });


 function validateInput(fname) {
    var input = event.target.value;
    var alpha = /^[a-zA-Z\s]*$/; // Regular expression to match only letters and spaces
    
    if (!alpha.test(input) || input.length > 20) {
        event.target.value = ''; 
        // Show a popup error message using alert
        alert('Error: Input must contain only letters and spaces and should be less than or equal to 20 characters.');
    }
}

 function validateInput(lname) {
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

</script>
</body>
</html>