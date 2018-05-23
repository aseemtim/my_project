<?php
	include 'connection.php';
	 error_reporting(0);
	
?>

<!DOCTYPE HTML>

<html>

<head>

<title>Update Record</title>

</head>

<body>
   
	<h1 >Update Items</h1>
	<?php
    include 'connection.php';
  
  //add error_reporting(0); to remove errors 
  
  
  $sql = "SELECT * FROM musicitem";
  $result = mysqli_query($conn, $sql);
  echo "<table cellpadding='0' cellspacing='0' border='1' width='400'>";

if (mysqli_num_rows($result) > 0) {
   
  while($row = mysqli_fetch_assoc($result)) {
  	$aid=$row["item_id"];
    echo "<tr>";
    echo "<td align='center'>".$row["item_id"]."."."</td>";
    echo "<td align='center'>".$row["item_name"]."</td>";
    echo "<td align='center'>".$row["item_album"]."</td>";
    echo "<td align ='center'><img height='100' width='100' src='../uploads/".$row['item_cover']."'></td>";
    echo "<td><a href='updated.php?id=$aid'>Update</a></td>";
    echo "</tr>";
  }
} else {
    echo "<h3><center>No user data found!<center></h3>";
}
echo "</table>";

?>
			
</body>

</html>