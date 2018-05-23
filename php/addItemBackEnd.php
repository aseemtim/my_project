<?php
session_start();
include("connection.php");


	if(isset($_POST['addItem']))
	{
		$itemName=$_POST['itemName'];
		$itemAlbum=$_POST['itemAlbum'];

		
    		$file=$_FILES['image']['tmp_name'];
	   	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	   	$image_name= addslashes($_FILES['image']['name']);
		move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/".$_FILES["image"]["name"]);
        $pic="../uploads/".$_FILES["image"]["name"];	
    		
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