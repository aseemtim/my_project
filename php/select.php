<?php  
 //select.php  
 $connect = mysqli_connect("localhost", "root", "", "music");  
 $output = array();  
 $query = "SELECT item_name, item_album FROM musicitem";  
 $result = mysqli_query($connect, $query);  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($row = mysqli_fetch_array($result))  
      {  
           $output[] = $row;  
      }  
      echo json_encode($output);  
 }  
 ?>