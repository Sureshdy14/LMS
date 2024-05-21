<?php

include "db_conn.php";

 $id = $_GET['id'];
if (isset($_POST['submit'])) {
   $book_name = $_POST['book_name'];
   $author = $_POST['author'];
   $book_code = $_POST['book_code'];
   $year = $_POST['year'];

  $sql = "UPDATE crud SET book_name='$book_name', author='$author', book_code='$book_code', year='$year' WHERE id = $id";


   $result = mysqli_query($conn,$sql);

   if ($result) {
   	header("Location:bookdetails.php?msg=New record Updated successfull");
   }
   else{
   	echo "Failed:" .mysqli_error($conn);
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
	<title>Edit user</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-secondary">
	php crud 	
</nav>
<div class="container">
	<div class="text-center mb-4">
		<h2>Edit Book Information</h2>
		<p class="text-muted">Click update after change information</p>
	</div>

     <div class="button float-end">
            <a href="bookdetails.php" class="btn btn-primary"><-Back</a>
          </div>
    <br>
	<?php
   
    $sql = "SELECT * FROM crud WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
     
    if ($result) {
        $row = mysqli_fetch_assoc($result);
       
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
?>
   
    <div class="container d-flex justify-content-center  ">
    	<form action="" method="POST" style="width:50vw; min-width: 300px;">
    		<div class="row mb-3">
    			<div class="mb-3">
    				<label class="form-label">Book Name</label>
    				<input type="text" name="book_name" class="form-control" value="<?php echo $row['book_name'] ?>" oninput="validateInput(book_name)">
    			</div>
    			<div class="mb-3">
    				<label class="form-label">Author</label>
    				<input type="text" name="author" class="form-control" value="<?php echo $row['author'] ?>" oninput="validateInput(author)">
    			</div>
    			<div class="col">
    				<label class="form-label">Book Code</label>
    				<input type="text" name="book_code" class="form-control" value="<?php echo $row['book_code'] ?>">
    			</div>
    				<div class="col">
    				<label class="form-label">Year</label>
    				<input type="text" name="year" class="form-control" value="<?php echo $row['year'] ?>">
    			</div>
    			<div>
                    <br>
    				<button type="submit" class="btn btn-success" name="submit" float-end>Update</button>
    				<a href="#" class="btn btn-danger">Cancel</a>
    			</div>



    			
    		</div>
    		
    	</form>
    </div>

</div>










<!--bootstrap5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
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