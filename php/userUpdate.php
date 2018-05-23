<?php
session_start();
include("connection.php");
$user=$_SESSION['user'];
$email=$_SESSION['useremail'];


if(isset($_POST['userupdate']))
{
	
	$value=$_POST['newinfo'];
	$pick=$_POST['pick'];

	class personalinfo
	{
		public $value1,$pick1;
		public function __construct($v,$p,$e)
		{
			$conn = mysqli_connect("localhost","root","", "music");
			$this->value1=$v;
			$this->pick1=$p;
			$this->email=$e;

			$sql = "UPDATE registration SET $this->pick1='$this->value1' WHERE email='$this->email'";

			if ($conn->query($sql) === TRUE) 
			{
				$sql = "SELECT * FROM registration where email='$this->email'";
              	$result = $conn->query($sql);
              	if ($result->num_rows > 0) 
              	{
                	while($row = $result->fetch_assoc()) 
                	{
                		$name2=$row["fname"];
                		$_SESSION['user']=$name2;
                	}
                }
    			echo "<script>
				alert('Record updated successfully');
				window.location.href='account.php';
				</script>";
			} 
			else 
			{
    			echo "Error updating record: " . $conn->error;
			}
				$conn->close();
		}
	} 

	$obj= new personalinfo($value,$pick,$email);
}

?>