<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
   $book_name = $_POST['book_name'];
   $author = $_POST['author'];
   $book_code = $_POST['book_code'];
   $year = $_POST['year'];
   $imagefile = $_POST['imagefile'];

   $sql = " INSERT INTO `crud`(`id`, `book_name`, `author`, `book_code`, `year`, `imagefile`, `created_at`) VALUES ('NULL',' $book_name','$author','$book_code','$year','$imagefile')";

   $result = mysql_query($conn,$sql);

   if ($result) {
   	header("Location:bookdetails.php?msg=New record created successfull");
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
	<title>book details</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-secondary">
	Book Details
</nav>

		<div class="container">
			<?php
			if (isset($_GET['msg'])) {
				$msg = $_GET['msg'];
				echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  '.$msg.'
						  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
			}

			?>
			<a href="add_new.php" class="btn bg-success">Add New</a>
       <div class="button float-end">
            <a href="admin.php" class="btn btn-secondary"><-Back</a>
          </div>
		</div>
    <br>


			<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Book code</th>
      <th scope="col">Year</th>
      <th scope="col">Image</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
     include "db_conn.php";

    	$sql = "SELECT * FROM crud";
    	$result = mysqli_query($conn,$sql);
    	while ($row = mysqli_fetch_assoc($result)) {
    	?>
<tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['book_name'] ?></td>
      <td><?php echo $row['author'] ?></td>
      <td><?php echo $row['book_code'] ?></td>
      <td><?php echo $row['year'] ?></td>
      <td><?php echo $row['imagefile'] ?></td>
      <td>
		<a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i> </a></td>
		<td><a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i> </a></td>
    </tr>
    <tr>
    	<?php

    }

    ?>

      
  </tbody>
</table>
    		</div>
    		
    	</form>
    </div>

</div>










<!--bootstrap5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>