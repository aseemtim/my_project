<?php  
//export.php  
$connect = mysqli_connect("localhost", "root", "", "music");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM registration";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
      <tr>  
        <th>ID</th>
        <th>FirstName</th>  
        <th>LastName</th>  
        <th>Email</th>  
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
      <td>'.$row["user_id"].'</td>  
      <td>'.$row["fname"].'</td>  
      <td>'.$row["lname"].'</td>  
      <td>'.$row["email"].'</td>  
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>