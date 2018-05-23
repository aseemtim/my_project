<html>
<head>
<title>Delete Data</title>
</head>

<body>
   
	<h1 >Delete Items</h1>
	<?php
    include 'connection.php';
   
  
  
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
    echo "<td><a href='deleted.php?id=$aid'>Delete</a></td>";
    echo "</tr>";
  }
} else {
    echo "<h3><center>No user data found!<center></h3>";
}
echo "</table>";

?>
</body>


</html>