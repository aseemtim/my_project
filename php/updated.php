<?php
	session_start();
	include('connection.php');
	error_reporting(0);
	$id = $_GET['id'];


	if (isset($_POST['updateItem'])){

		$name=$_POST['itemName'];
		$album=$_POST['itemAlbum'];

		$file=$_FILES['image']['tmp_name'];
		$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
		$image_name= addslashes($_FILES['image']['name']);
			move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/".$_FILES["image"]["name"]); // moves uploaded file inside the images folder.
			$pic="../uploads/".$_FILES["image"]["name"];


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

<!DOCTYPE HTML>

<html>

	<head>
		<title>Update Record</title>
	</head>

	<body>

		<div class="container">
			<h1 class="page-header text-center"><br>Update Item</h1>
			<form class="form-horizontal"  role="form" method="post" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name" class="col-md-3 field-label">ItemName</label>
					<div class="col-md-3">
						<input type="text" class="form-control" id="fname" name="itemName" style="width: 300px;" placeholder="First Name" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['fname']);} ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="lame" class="col-md-3 control-label">ItemAlbum</label>
					<div class="col-md-9">
						<input type="text" class="form-control" id="lname" name="itemAlbum" style="width: 300px;" placeholder="Last Name" value="<?php if (isset($_POST['lame'])) { echo htmlspecialchars($_POST['lname']);} ?>">

					</div>
				</div>
				<div class="form-group">
					<label for="image" class="col-sm-3 control-label">ChooseCover</label>
					<div class="col-sm-9">
						<input type="file" class="form-control-file" name="image" />

					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-6 col-sm-offset-6">
						<input id="submit" name="updateItem" type="submit" value="Update" class="btn btn-primary">
					</div>
				</div>
			</form> 
		</div>	
	</body>
</html>