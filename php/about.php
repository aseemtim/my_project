<!DOCTYPE html>
  <head>
    <title>Form submission</title>
    <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/contactForm.css" rel="stylesheet">
    <link href="../css/music.css" rel="stylesheet">
    <link href="../css/accordian.css" rel="stylesheet">

    <style> 
      #map{
        height:400px;
        width:100%;
      }
    </style>
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
              <a class="nav-link" href="index.php">Home</a>
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

            <li class="nav-item active">
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

    <div id="map"></div>
    <script>
      function initMap(){
        //Map options
        var options={
          zoom:8,
          center:{lat:27.7172,lng:85.3240}
        }
        //New map
        var map = new google.maps.Map(document.getElementById('map'),options);


        //Add marker
        var marker = new google.maps.Marker({position:{lat:27.705469,lng:85.343664},map:map,
          icon:'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'});

        //Add info
        var infoWindow = new google.maps.InfoWindow({content:'<h1> Battisputali</h1>'});
        
        marker.addListener('click', function(){
          infoWindow.open(map,marker);
        });
      }
    </script>

  <div class="container">
    <br><p>Everyone loves music. This website is solely made for those music lovers out there. Browse thorugh our library, add to your playlist songs that you listen often. If you encounter any problems please feel free to provide feedback about it.
    </p>

    <div class="accordion">
      <div class="accord-header">About Us</div>
      <div class="accord-content"><p>We are a 3 man team who are music maniac. We knew each other from our childhood and studied about Internet Developing at the same university. Our group is called chainreaction and we hope you won't forget us in the future.</p></div>
      <div class="accord-header">About Update</div>
      <div class="accord-content">We update our website daily as music are relased daily. We work 24/7 in shift so that our users can get full satisfaction from our website</div>
      <div class="accord-header">Feedback</div>
      <div class="accord-content">Nothing is perfect and that also includes our website. If you have anything to say about our website or find anything buggy please send you feedback at Contact Us page. We value our user's feedback more than anything.</div>
    </div>

  
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $(".accordion .accord-header").click(function() {
      if($(this).next("div").is(":visible")){
        $(this).next("div").slideUp("slow");
      } else {
        $(".accordion .accord-content").slideUp("slow");
        $(this).next("div").slideToggle("slow");
      }
    });
  });
</script>

<script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyDMALyy8u8TgHu1DGtqS6hf6u5xN715UsU &callback=initMap">
    </script>

  </body>
</html>