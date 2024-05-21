<?php
include "db_conn.php";
session_start();

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
 TakenBook Details
</nav>
            <div class="button float-end">
            <a href="userpanel.php" class="btn btn-secondary"><-Back</a>
          </div>
          <br>

			
    <?php
     include "db_conn.php";
$fullname = $_SESSION['name'];
  $sql = "SELECT bookregister.fullname, bookregister.email, bookregister.bookname, bookregister.author, bookregister.takendate, bookregister.returndate
        FROM bookregister 
        LEFT JOIN users ON bookregister.fullname = users.username where bookregister.fullname = '$fullname'";

// Execute query
$result = $conn->query($sql);
// Display results in HTML table
if ($result->num_rows > 0) {
    echo "<div class='table-responsive'>
            <table class='table table-striped'>
                <thead>
                    <tr>    
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Book Name</th>
                        <th>Author</th>
                        <th>Taken Date</th>
                        <th>Return Date</th>
                    </tr>
                </thead>
                <tbody>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["fullname"]."</td>
                <td>".$row["email"]."</td>
                <td>".$row["bookname"]."</td>
                <td>".$row["author"]."</td>
                <td>".$row["takendate"]."</td>
                <td>".$row["returndate"]."</td>
            </tr>";
    }
    echo "</tbody>
        </table>
    </div>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>















<!--bootstrap5-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>