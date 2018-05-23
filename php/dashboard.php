<?php
session_start();
?>
<html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="../css/style_admin.css" rel="stylesheet">

</head>

<body>



  <div id="header">
    <center>
      <h3> Welcome to Admin Panel</h3></center>
    </div>

    <div id="sidemenu">
     <ul>
      <li><a href="addItem.php" target="_blank"> Add Post </a></li>
      <li><a href="deleteItems.php" target="_blank"> Delete Post </a></li>
      <li><a href="updateItem.php" target="_blank"> Update Post </a></li>
      <li><a href="userTable.php" target="_blank"> User PDF </a></li>
      <li><a href="convertXML.php" target="_blank"> Convert XML </a></li>
      <li><a href="../xml/appropriateXML.xml" target="_blank"> Appropriate XML </a></li>
      <li><a href="encodeJson.php" target="_blank"> Json Encoded </a></li>


      <li><a href="logout.php"> Logout </a></li>
    </ul>  
  </div>

  <div id="data">
    <br><br>

    <div ng-app="myapp" ng-controller="usercontroller" ng-init="displayData()">  

     <table class="table table-bordered">  
      <tr>  
       <th>Song Name</th>  
       <th>Song Album</th>  
     </tr>  
     <tr ng-repeat="x in names">  
       <td>{{x.item_name}}</td>  
       <td>{{x.item_album}}</td>  
     </tr>  
   </table>  
 </div>  
</div>  
</body>  
</html>  
<script>  
 var app = angular.module("myapp",[]);  
 app.controller("usercontroller", function($scope, $http){  

  $scope.displayData = function(){  
   $http.get("select.php")  
   .success(function(data){  
    $scope.names = data;  
  });  
 }  
});  
</script>

</body>
</html>