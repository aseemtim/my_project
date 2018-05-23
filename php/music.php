<?php
session_start();
include("connection.php");


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

    <link href="../css/music.css" rel="stylesheet">
    <link href="../css/carousel.css" rel="stylesheet">
	<link href="../css/footer.css" rel="stylesheet">
    

 
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
            <li class="nav-item active">
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
                echo'<li class="nav-item">
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
              <a class="nav-link" href="about.php">About Us</a>
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
          <form class="form-inline mt-2 mt-md-0" method="POST" action= "search.php" role="search">
            <input class="form-control mr-sm-2" type="text" placeholder="Search Song" name= "word" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
          </form>
        </div>
      </nav>
    </header>
	
	<div class="container">
    	
    	<div id = "music">
        <div class="row">
          <div class="col-md-offset-1 col-md-10 text-center"><h3>Music</h3></div>
          <div class="col-md-offset-0 col-md-1"style="float: left;"><h4><form action="sort.php" method="post">
                                                        <select name="sort" id="sort" style="padding: 5px 10px;">
                                                        <option label="sort">Sort:</option>
                                                        <option>Name</option>
                                                        <option>Date</option>
                                                        </select>
          <button type="submit" name="submit" value="submit">Submit</button>    
          </form></h4></div>
       </div>
          
    <?php 
    $sql = "SELECT * FROM musicitem";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()){
      $aid=$row["item_id"];
      /*echo '<div class="row">';
        echo '<h4 class="text-center">'.$row["item_name"].'</h4>';
     	echo "<img class='resize-image center-block' src='../uploads/".$row['item_cover']."'>";
        
        echo '<h4 class="text-center">'.$row["item_album"].'</h4>';
        echo "<a href='favorites.php?id=$aid' class='btn'>Add To Favorites</a>"."</div>";*/
        echo '<div class="row">';
        echo '<div class="col-md-offset-1 col-md-8"><h3>'.$row["item_name"].'</h3><br></div>';
        echo '</div>';
      echo '<div class="row">';
        echo '<div class="col-md-offset-0 col-md-4">'; ?><img src="<?php echo $row["item_cover"];?>" height="60%" width="90%" style="border-radius: 10px;"><?php echo '</div>';
        echo '<div class="col-md-4"><b>'.$row["item_album"].'</b></div>';
        echo "<div class='col-md-2'> <br><a href='playlist.php?id=$aid' class='btn'>Add To Playlist</a>"."</div>";
      echo '</div>';
    }
}

  ?>

      <!-- FOOTER -->
	  <div id="footer">
		  <footer class="container">
			<p class="float-right"><a href="#">Back to top</a></p>
			<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		  </footer>
		</div>
 


    <!-- Bootstrap core JavaScript
    ================================================== -->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
