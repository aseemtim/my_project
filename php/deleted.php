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