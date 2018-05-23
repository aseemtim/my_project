<?php

include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../css/aud.css" rel="stylesheet">




   <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Add Item</title>

  </head>
  	
  <body>

  <div class="container">
          <h1 class="page-header text-center"><br>Add Item</h1>
          <form class="form-horizontal"  role="form" method="post" action="addItemBackEnd.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="name" class="col-md-3 field-label">ItemName</label>
              <div class="col-md-3">
                <input type="text" class="form-control" id="fname" required name="itemName" style="width: 300px;" placeholder="First Name" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['fname']);} ?>">
              </div>
            </div>
            <div class="form-group">
              <label for="lame" class="col-md-3 control-label">ItemAlbum</label>
              <div class="col-md-9">
                <input type="text" class="form-control" id="lname" name="itemAlbum" required style="width: 300px;" placeholder="Last Name" value="<?php if (isset($_POST['lame'])) { echo htmlspecialchars($_POST['lname']);} ?>">
               
              </div>
            </div>
            <div class="form-group">
              <label for="image" class="col-sm-3 control-label">ChooseCover</label>
              <div class="col-sm-9">
                <input type="file" class="form-control-file" name="image" required='' />
               
             </div>
             </div>

            
            <div class="form-group">
              <div class="col-sm-6 col-sm-offset-6">
                <input id="submit" name="addItem" type="submit" value="Add" class="btn btn-primary">
              </div>
            </div>
          </form> 
        </div>
       </body>
       </html>
