<?php

include "db_conn.php";

 if (isset($_POST['submit'])) {
  

  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        die("File is not an image.");
    }
    
    // Check file size
    if ($_FILES['image']['size'] > 5000000) { // 5MB
        die("Sorry, your file is too large.");
    }
    
    // Allow certain file formats
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
    }
    
    // Upload file
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        echo "The file ". htmlspecialchars(basename($_FILES['image']['name'])). " has been uploaded.";
        
        // Save image to database
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
        $book_name = $_POST['book_name'];
       $author = $_POST['author'];
       $book_code = $_POST['book_code'];
       $year = $_POST['year'];
      $imageName = $_FILES['image']['name'];

       $sql = "INSERT INTO crud(book_name, author, book_code, year,imagefile) VALUES ( '$book_name','$author','$book_code',' $year','$imageName')";
        if ($conn->query($sql) === TRUE) {
            echo "Image data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        die("Sorry, there was an error uploading your file.");
    }
}
 }
?>






<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--bootstrap5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!---->
    <title>add user</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-secondary">
    php crud    
</nav>
<div class="container">
    <div class="text-center mb-4">
        <h2>add new user</h2>
        <p class="text-muted">complete the form below to add a new</p>
    </div>
    <div class="button float-end">
            <a href="admin.php" class="btn btn-secondary"><-Back</a>
          </div>
    
    <div class="container d-flex justify-content-center  ">

        <form action="" method="POST" enctype="multipart/form-data" style="width:50vw; min-width: 300px;" id="myForm">
            <div class="row mb-3">

                <div class="mb-3">
                    <label class="form-label">Book Name</label>
                    <input type="text" name="book_name" class="form-control" placeholder="book name enter" oninput="validateInput(book_name)">
                </div>
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" placeholder="author enter" oninput="validateInput(author)">
                </div>
                <div class="col">
                    <label class="form-label">Book Code</label>
                    <input type="text" name="book_code" class="form-control" placeholder="book code enter">
                </div>
                    <div class="col">
                    <label class="form-label">Year</label>
                    <input type="text" name="year" class="form-control" placeholder="year enter" >
                </div>
                <div class="col">
                    <label class="form-label">Choose File</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>


                <div>
                    <br>
                    <button type="submit" class="btn btn-success" name="submit" float-end>Save</button>
                    <a href="add_new.php" class="btn btn-danger" id="cancelBtn">Cancel</a>
                </div>



                
            </div>
            
        </form>
    </div>

</div>







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


   function validateInput(book_name) {
    var input = event.target.value;
    var alpha = /^[a-zA-Z\s]*$/; // Regular expression to match only letters and spaces
    
    if (!alpha.test(input) || input.length > 20) {
        event.target.value = ''; 
        // Show a popup error message using alert
        alert('Error: Input must contain only letters and spaces and should be less than or equal to 20 characters.');
    }
}
 function validateInput(author) {
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