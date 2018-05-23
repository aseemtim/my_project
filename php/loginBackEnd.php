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