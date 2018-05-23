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

    <link href="../css/carousel.css" rel="stylesheet">
    
	<link href="../css/footer.css" rel="stylesheet">
  
   
  </head>

  <body>

  <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php"><img src="../image/logo.png" alt="wesite_logo" height="30" width="60"></a>
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


    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="../image/stressedout.jpeg" alt="First slide" class="img-responsive">
            
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../image/dusktilldawn.jpg" alt="Second slide" class="img-responsive">
            
          </div>
          <div class="carousel-item">
            <img class="third-slide" src="../image/mademedo.jpg" alt="Third slide" class="img-responsive">
           
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

		<div>
			<script>
			  (function() {
				var cx = '016604193766717121468:pex8o34wrfw';
				var gcse = document.createElement('script');
				gcse.type = 'text/javascript';
				gcse.async = true;
				gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(gcse, s);
			  })();
			</script>
<gcse:search></gcse:search>
		</div>
      
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">

        


        <!-- START THE FEATURETTES -->


        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Stressed Out. <span class="text-muted">It'll blow your mind.</span></h2>
            <p class="lead">We are 3 man team of game enthusiast from different nation. We are working under one common name, 'chainraection' and have same goal i.e. to help others gamers to find new and best music.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../image/stressedout.jpeg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading">Dusk Till Dawn <span class="text-muted">It's so good.</span></h2>
            <p class="lead">We update our page in daily basis. So brace yourself because new songs are coming daily.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto" src="../image/dusktilldawn.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">Look What You Made Me Do. <span class="text-muted">Checkmate.</span></h2>
            <p class="lead">We always welcome feedbacks from our visitors. So if you have any recommendation regarding our page or content feel free to submit your feedbacks in Contact Us page.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" src="../image/mademedo.jpg" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
    </main>

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
