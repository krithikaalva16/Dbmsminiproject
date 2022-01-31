<?php
session_start();
include ('connection.php');

if (isset($_POST['submit'])) {

	$sid=$_POST['sid'];
	$password=$_POST['password'];

	if(empty($username) || empty($password))
{
    header('location:main.php?blank');
    
}

else{
	$sql="SELECT * from student WHERE sid='$sid' && password='$password'";

	$result=(mysqli_query($conn, $sql));
	if ($result->num_rows>0) {


		$_SESSION["sid"]=$sid;
		header("Location:user_dashboard.php");
		
		
		
	}
	
	else{
		//echo "Email and Password are incorrect";
		header('location:main.php?incorrect');
		
	}

	}

}
?>