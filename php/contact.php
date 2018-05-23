<?php

include("connection.php");
session_start();

?>


<!DOCTYPE html>
<head>
<title>Form submission</title>
<link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../css/contactForm.css" rel="stylesheet">
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
              <a class="nav-link" href="music.php">Music</a>
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


	<div class="container" align="center">
      <div class="row">
        <div class="col-md-12">
          <h1 class="text-center"><br>Contact Us</h1>
          <form class="form-horizontal" role="form" method="post" action="sendcontact.php">
            <div class="form-group">
              <label for="name" class="col-md-3 control-label">First Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="name" required name="fname" style="width: 300px;" placeholder="First Name" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['name']);} ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lame" class="col-md-3 control-label">Last Name</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="lame" name="lname" required style="width: 300px;" placeholder="Last Name" value="<?php if (isset($_POST['lame'])) { echo htmlspecialchars($_POST['lame']);} ?>">
               
              </div>
            </div>
            <div class="form-group">
              <label for="email" class="col-sm-3 control-label">Email</label>
              <div class="col-sm-9">
                <input type="email" class="form-control" id="email" name="email" required style="width: 300px;" placeholder="example@domain.com" value="<?php if (isset($_POST['email'])) { echo htmlspecialchars($_POST['email']);} ?>">
               
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-6">
                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
              </div>
            </div>
          </form> 
        </div>
	</div>
	</div>
		  <div id="footer">
		  <footer class="container">
			<p class="float-right"><a href="#">Back to top</a></p>
			<p>&copy; 2017 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		  </footer>
		</div>
	

</body>
</html>