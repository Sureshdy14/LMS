<!DOCTYPE html>
<!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href= 
"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" 
          rel="stylesheet"> 
    
    <!-- Bootstrap Bundle with Popper -->
    <script src= 
"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"> 

    </script>
<style>

  /* Custom CSS for Header */
    .navbar-brand {
      transition: all 0.3s ease;
    }

    .navbar-brand:hover {
      transform: scale(1.1);
    }

    .nav-link {
      transition: color 0.3s ease;
      font-size: 25px;
    }

    .nav-link:hover {
      color: #007bff;

      background-color: #007bff;
      border-radius: 5px;
    }

/*profile*/

.user-pic{
  width: 40px;
  border-radius: 50%;
  cursor: pointer;
  margin-left: 30px;
}




.sub-menu-warp{
      position: absolute;
      top: 100%;
      right: 0;
      width: 320px;
      max-height: 0; /*400*/
      overflow: hidden;
      transition: max-height 0.5s;
       z-index: 1;

}
.sub-menu-warp{
  display: none;
    max-height: 400px;
}



.sub-menu{
      background: #fff;
      padding: 20px;
      margin: 10px;
}



.user-info{
      display: flex;
      align-items: center;
}

.user-info h3{
      font-weight: 500;
}

.user-info img{
  width: 60px;
  border-radius: 50%;
  margin-right: 15px;
}

.sub-menu hr{
  border: 0;
  height: 1px;
  width: 100%;
  background: black;
  margin: 15px 0 10px;
}

.sub-menu-link{
  display: flex;
  align-items:center;
  text-decoration:none;
  color: #525252;
  margin: 12px 0;
}
.sub-menu-link p{
   width: 100%;
}
.sub-menu-link img{
  width: 40px;
  background: #e5e5e5;
  border-radius: 50%;
  padding: 8px;
  margin-right: 15px;
}

.sub-menu-link span{
  font-size: 22px;
  transition: transform 0.5s;
}
.sub-menu-link:hover span{
  transform: translatex(5px);

}
.sub-menu-link:hover p{
  font-weight: 600;

}



/*p-end*/


</style>


  <div class="hero">
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <img src="logo.png">
     
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php" onclick="scrollToSection('section1')">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php" onclick="scrollToSection('section2')">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php" onclick="scrollToSection('section3')">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php" onclick="scrollToSection('section4')">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        </ul>

        <img src="upro.png" class="user-pic" onclick="myFunction()">

  <div class="sub-menu-warp" id="myLinks" class="overlay">
  <div class=sub-menu >
   <div class="user-info">
  <img src="upro.png">     
  <h3>Suresh</h3>
   </div>  
   <hr>  

   <a href="" class="sub-menu-link">
    <img src="upro.png">
    <p>profile</p>
    <span>></span>
   </a>
   <a href="" class="sub-menu-link">
    <img src="category.jpg">
    <p>Category</p>
    <span>></span>
   </a>
   <a href="" class="sub-menu-link">
    <img src="setting.jpg">
    <p>Setting</p>
    <span>></span>
   </a>
   <a href="https://www.google.com/" class="sub-menu-link" id="logoutButton">
    <img src="logout.jpg">
    <p>Logout</p>
    <span>></span>
   </a>

  </div> 
</div>

      </div>
    </nav>
</div>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>