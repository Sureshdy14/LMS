<?php

include 'db_conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $bookname = $_POST['bookname'];
    $author = $_POST['author'];
    $takendate = $_POST['takendate'];
    $returndate = $_POST['returndate'];

  
            $sql = "INSERT INTO bookregister(fullname, email, bookname, author, takendate, returndate) 
                    VALUES ('$fullname', '$email', '$bookname', '$author', '$takendate', '$returndate')";

           if ($conn->query($sql) === TRUE) {
                  echo "<script>alert('Our Team will Contact you Soon!');</script>";
                   header("Location:index.php");
                   exit;
                } else {
                  $error = "Error: " . $sql . "<br>" . $conn->error;
                }

    }
    

?>