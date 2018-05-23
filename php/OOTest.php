<!-- Connection in connection.php-->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="music";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
?>

<!-- ===================================================================== -->

<!-- User Data shown in userTable.php -->
<?php  
 function fetch_data()  /*Only Object Oriented Part is shown here*/
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "music");  
      $sql = "SELECT * FROM registration";  
      $result = mysqli_query($connect, $sql);  
      while($row = mysqli_fetch_array($result))  
      {       
      $output .= '<tr>  
                          <td>'.$row["user_id"].'</td>  
                          <td>'.$row["fname"].'</td>  
                          <td>'.$row["lname"].'</td>  
                          <td>'.$row["email"].'</td>  
                     </tr>  
                          ';  
      }  
      return $output;  
 }
 ?>
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Table data of Users</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />            
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">Table data of Users</h3><br />  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">ID</th>  
                               <th width="25%">FirstName</th>  
                               <th width="25%">LastName</th>  
                               <th width="45%">Email</th>  
                          </tr>  
                     <?php  
                     echo fetch_data();  
                     ?>  
                     </table>  
                     <br />  
                     <form method="post">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" value="Create PDF" />  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>

<!-- ===================================================================== -->

<!-- Login using class and constructor in loginBackend.php -->

<?php

include("connection.php");

if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	if(!empty($_POST['email']) && !empty($_POST['password']))
	{
		if($email=='admin@gmail.com' && $password=='admin')
		{
			session_start();
			$_SESSION['admin']=$email;
			echo "<script>window.location.href='dashboard.php';</script>";
		}
		else {
			class VerifyUser
			{
				public $email,$password;

				public function __construct($e,$p)
				{
					$conn = mysqli_connect("localhost","root","", "music");
					$this->email=$e;
					$this->password=$p;
					$password2=md5($this->password);


					$sql = "SELECT * FROM registration WHERE email='$this->email' and password='$password2'";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) 
					{
						while($row = $result->fetch_assoc()) 
						{
							session_start();
							$_SESSION['user']=$row["fname"];
							$_SESSION['useremail'] = $row["email"];
							echo "<script>
							window.location.href='account.php';
							</script>";
						}
					}
					else
					{
						echo "<script>
							alert('Wrong email or Password. Try Again');
							window.location.href='loginRegister.php';
							</script>";
					}
				}
			}

			$object= new VerifyUser($email,$password);
		}
	}	
}

?>

<!-- ========================================================================== -->

<!-- Register  using class and constructor with server side validation and captcha in registerBackend.php -->

<?php
session_start();
include("connection.php");


if(isset($_POST['register']))
{
	/*CAPTCHA validation*/
	if(isset($_POST['txt_value'])){
		$text_value=$_POST['txt_value'];
		if ($_SESSION['code']==$text_value){
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$cpassword=$_POST['cpassword'];
	
	
			if (!preg_match("/^[a-zA-Z ]*$/",$fname)) 
			{
				echo "<script>
					alert('Invalid First Name! First Name should contain letters only.');
					window.location.href='';
				</script>";                         
			}

			else if (!preg_match("/^[a-zA-Z ]*$/",$lname)) 
			{
			   echo "<script>
					alert('Invalid Last Name! Last Name should contain letters only.');
					window.location.href='';
				</script>";                        
			}
			  
			else if($password != $cpassword)
			{
				echo "<script>
					alert('Invalid Password! Your password does not match.');
				</script>";
			}



			class Register
			{
				public $firstname,$lastname,$email,$password,$sql,$conn;

				public function __construct($fname,$lname,$email,$password)
				{
					$conn = mysqli_connect("localhost","root","", "music");
					$this->firstname=$fname; //storing the above parameter's value to this.variable
					$this->lastname=$lname;
					$this->email=$email;
					$this->password=$password;
					$password2=md5($this->password);

					$sql1 = "SELECT * FROM registration where email='$this->email'";
					$result1 = $conn->query($sql1);
					if ($result1->num_rows > 0) 
					{
						echo "<script>
						alert('Email already Exist.Try with new email ID');
						</script>";
					}
					else
					{
						
						$sql = "INSERT INTO registration(fname, lname, email, password)
						VALUES ('$this->firstname', '$this->lastname', '$this->email','$password2')";
				
						if ($conn->query($sql) === TRUE) 
						{
							echo "<script>
							alert('Registration Successful');
							window.location.href='loginRegister.php';
							</script>";
						} 
						else 
						{
							echo "Error! " . $sql . "<br>" . $conn->error;
						}
					}
				}

				
			}

			$object = new Register($fname,$lname,$email,$password);//values we got from post
		}
		else {
			echo "<script>
				alert('Wrong Answer');
				window.location.href='loginRegister.php';
			</script>";
		}
	}
	else {
		echo "<script>
			alert('Enter an Answer');
			window.location.href='loginRegister.php';
		</script>";
	}
}

?>

<!-- ========================================================================== -->


<!-- Items shown from databse in music.php -->
<?php 
/*include "connection.php";*/
    $sql = "SELECT * FROM musicitem";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

   while($row = $result->fetch_assoc()){
      $aid=$row["item_id"];
      
        echo '<div class="row">';
        echo '<div class="col-md-offset-1 col-md-8"><h3>'.$row["item_name"].'</h3><br></div>';
        echo '</div>';
      echo '<div class="row">';
        echo '<div class="col-md-offset-0 col-md-4">'; ?><img src="<?php echo $row["item_cover"];?>" height="60%" width="90%" style="border-radius: 10px;"><?php echo '</div>';
        echo '<div class="col-md-4"><b>'.$row["item_album"].'</b></div>';
        echo "<div class='col-md-2'> <br><a href='favorites.php?id=$aid' class='btn'>Add To Playlist</a>"."</div>";
      echo '</div>';
    }
}

  ?>

<!-- =============================================================================== -->

<!-- Item Data in Admin Dashboard in dashboard.php-->
<?php
   include 'connection.php';
  
   $sql = "SELECT * FROM musicitem";
   $result = $conn->query($sql);
   echo "<table cellpadding='0' cellspacing='0' border='0' width='400'>";

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td align='center'>".$row["item_id"]."."."</td>";
		echo "<td align='center'>".$row["item_name"]."</td>";
		echo "<td align='center'>".$row["item_album"]."</td>";
		echo "<td align ='center'><img height='50' width='50' src='../uploads/".$row['item_cover']."'></td>";
		echo "</tr>";
		}
	} 
	else {
		echo "<h3><center>No user data found!<center></h3>";
	}
   echo "</table>";
?>

<!-- ===================================================================== -->

<!-- Added Item -->
<?php
session_start();
include("connection.php");

		/*Only use of Object Oriented is shown here*/	
    		
		class Additem
		{
			public $itemname1,$itemalbum1,$file1;

			public function __construct($i,$a,$f)
			{
				$conn = mysqli_connect("localhost","root","", "music");
				$this->itemname1=$i;
				$this->itemalbum1=$a;
				$this->file1=$f;

				$sql = "INSERT INTO musicitem(item_name, item_album, item_cover)
				VALUES ('$this->itemname1', '$this->itemalbum1', '$this->file1')";
		
				if ($conn->query($sql) === TRUE) 
				{
    			echo "<script>
				alert('Item Added Sucessfully');
				window.location.href='dashboard.php';
				</script>";
				} 
				else 
				{
    				echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
		}

		$obj = new Additem($itemName,$itemAlbum,$pic);

	}	
?>

<!-- ===================================================================== -->

<!-- Deleted item in deleted.php -->
<?php
include('connection.php');

if (isset($_GET['id']))

{

// get id value

$id = $_GET['id'];
class DeleteItem
		{
			public $itemid1;

			public function __construct($i)
			{
				$conn = mysqli_connect("localhost","root","", "music");
				$this->itemid1=$i;
				
				$sql = "Delete from musicitem where item_id = '$this->itemid1'";
		
				if ($conn->query($sql) === TRUE) 
				{
    			echo "<script>
				alert('Item Deleted Sucessfully');
				window.location.href='deleteItems.php';
				</script>";
				} 
				else 
				{
          			echo "Error deleting record: " . $conn->error;
				}
			}
		}

		$obj = new DeleteItem($id);

}

else

// if id isn't set, or isn't valid

{

echo "Somethng went wrong";

}


?>

<!-- ===================================================================== -->

<!-- Updated items in updated.php -->
<?php
	session_start();
	include('connection.php');
	error_reporting(0);
	$id = $_GET['id'];


			/*Only Object Oriented part is shown here*/

			class UpdateInfo
			{
				public $itemid1,$name1,$album1,$pic1;
				public function __construct($i,$n,$a,$p)
				{

					$conn = mysqli_connect("localhost","root","", "music");
					$this->itemid1=$i;
					$this->name1=$n;
					$this->album1=$a;
					$this->pic1=$p;


					$sql = "UPDATE musicitem SET item_name='$this->name1', item_album='$this->album1', item_cover='$this->pic1' WHERE item_id='$this->itemid1'";
					if ($conn->query($sql) === TRUE) 
					{
						echo "<script>
						alert('Record updated successfully');
						window.location.href='updateItem.php';
					</script>";    
				}
				else
				{
					echo "Error updating record: " . $conn->error;
				}

				$conn->close();
			}
		}
		$obj= new UpdateInfo($id,$name,$album,$pic);
		
	}
?>

<!-- ===================================================================== -->

<!-- Seaching item with Object ORiented -->

 <?php 
  include('connection.php');
  if(isset($_POST['submit']))  {


 $search = $_POST['word'];

    $sql = "Select * From musicitem where item_name like '%$search%'";
    $result = $conn->query($sql);
  

   if ($result->num_rows > 0) {

     while($row = $result->fetch_assoc()){
      $aid=$row["item_id"];
        echo '<div class="row">';
        echo '<div class="col-md-offset-1 col-md-8"><h3>'.$row["item_name"].'</h3><br></div>';
        echo '</div>';
      echo '<div class="row">';
        echo '<div class="col-md-offset-0 col-md-4">'; ?><img src="<?php echo $row["item_cover"];?>" height="60%" width="90%" style="border-radius: 10px;"><?php echo '</div>';
        echo '<div class="col-md-4"><b>'.$row["item_album"].'</b></div>';
        echo "<div class='col-md-2'> <br><a href='favorites.php?id=$aid' class='btn'>Add To Playlist</a>"."</div>";
      echo '</div>';
      }
    }
}
    ?>

<!-- ===================================================================== -->

<!-- Sorted Item with Object Oriented -->

<?php 
  include('connection.php');
  if(isset($_POST['submit']))  {


    $date=$_POST['sort']; 
    if($date=='Date'){  
    $sql = "select * from musicitem order by item_id desc";
    }
    else{
      $sql = "select * from musicitem order by item_name";
    }
    $result = $conn->query($sql);
  

   if ($result->num_rows > 0) {

     while($row = $result->fetch_assoc()){
      $aid=$row["item_id"];
        echo '<div class="row">';
        echo '<div class="col-md-offset-1 col-md-8"><h3>'.$row["item_name"].'</h3><br></div>';
        echo '</div>';
      echo '<div class="row">';
        echo '<div class="col-md-offset-0 col-md-4">'; ?><img src="<?php echo $row["item_cover"];?>" height="60%" width="90%" style="border-radius: 10px;"><?php echo '</div>';
        echo '<div class="col-md-4"><b>'.$row["item_album"].'</b></div>';
        echo "<div class='col-md-2'> <br><a href='favorites.php?id=$aid' class='btn'>Add To Playlist</a>"."</div>";
      echo '</div>';
      }
    }
}
    ?>



