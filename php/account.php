<?php
session_start();
include("connection.php");
if (isset($_SESSION['useremail'])){
    $email = $_SESSION['useremail'];
}
?>

<!doctype html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <title>Music Playlist</title>
   

    <!-- Bootstrap core CSS -->
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">
    <link href="../css/userUpdate.css" rel="stylesheet">
    

  
    
    
    
 
  </head>

  <body>

  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php"><img src="../image/logo.png" height="30px" width="60px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Music</a>
            </li>
            <?php
              if(!empty($_SESSION['admin']))
              {
                echo'<li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>';
              }
              else if(!empty($_SESSION['user']))
              {
  
                $username=$_SESSION['user'];
                echo'<li class="nav-item active">
                <a class="nav-link" href="account.php">'.' ';
                echo$_SESSION['user'].'</a>
                </li>';
              }
              else{
  
                echo'<li class="nav-item">
                <a class="nav-link" href="loginRegister.php">Login/Signup</a>
                </li>';
              }
            ?>
  
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=contact.php>Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href=contact.php>Playlist</a>
            </li>
  
           <?php
              if(!empty($_SESSION['admin'])||!empty($_SESSION['user']))
              {
                echo'<li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
                </li>';
              }
            ?>
  
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>

    <div class="row">
          <div class="col-md-5">
            <?php
              $sql = "SELECT * FROM registration where email='$email'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) 
              {
                while($row = $result->fetch_assoc()) 
                {
                  $fname=$row["fname"];
                  $lname=$row["lname"];
                  $email=$row["email"];
                  echo'<h3>Name: '.$fname.'</h3>';
                  echo'<h3>Last Name: '.$lname.'</h3>';
                  echo'<span><h3>Email: '.$email.'</h3></span>';
                              
                }   
              }      
            ?>
          </div> 
    </div>
   <div class="container-right">

    <div class="container-form">

        <h3 class="text-center text-lg text-uppercase my-0">
          <strong>Update Details</strong>
        </h3>
      <hr class="divider"> 
      <form action="userUpdate.php" method="post">

        <div class="form-group">
          <select class="form-control" name='pick'>
            <option value='fname'>First Name</option>
            <option value='lname'>Last Name</option>
          </select>
        </div>

        <div class="form-group">
          <input type="text" class="form-control" placeholder="New Information" name='newinfo' required=''>
        </div>
        
        <button type="submit" class="btn btn-success-secondary" name="userupdate">Update</button>
      </form> 
    </div>
   </div> 