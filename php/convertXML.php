<?php 
include'connection.php';

$sql = "SELECT * FROM registration";
$res = mysqli_query($conn,$sql);

$dom = new DOMDocument('1.0','UTF-8');
$dom->formatOutput = true;
$root = $dom->createElement('Music');
$dom->appendChild($root);

while ($row = mysqli_fetch_assoc($res)) {
   $result = $dom->createElement('User');
   $root->appendChild($result);
   $result->setAttribute('id',  $row['user_id']);
   $result->appendChild( $dom->createElement('FirstName',$row['fname']) );
   $result->appendChild( $dom->createElement('Lastname',$row['lname']) );
   $result->appendChild( $dom->createElement('Email',$row['email']) );  
}

echo '<xmp>'. $dom->saveXML() .'</xmp>';
   $dom->save('../xml/convertedXML.xml') or die('XML Create Error');


 ?>
 