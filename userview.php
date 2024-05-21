
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
  <title>User Taken Book</title>
</head>
<body>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5 bg-primary">
  User Registered Details
</nav>
          <div class="button float-end">
            <a href="admin.php" class="btn btn-secondary"><-Back</a>
          </div>
          <br>

      <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">User Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phonenumber</th>
      <th scope="col">DOB</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
    <?php
     include "db_conn.php";

      $sql = "SELECT * FROM users";
      $result = mysqli_query($conn,$sql);
      while ($row = mysqli_fetch_assoc($result)) {
      ?>
<tr>
      <td><?php echo $row['id'] ?></td>
      <td><?php echo $row['username'] ?></td>
      <td><?php echo $row['email'] ?></td>
      <td><?php echo $row['phonenumber'] ?></td>
      <td><?php echo $row['dob'] ?></td>
      <td><?php echo $row['gender'] ?></td>
      <td><?php echo $row['address'] ?></td>
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