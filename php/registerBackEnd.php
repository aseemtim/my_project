<?php
session_start();
include("connection.php");


if(isset($_POST['register']))
{
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