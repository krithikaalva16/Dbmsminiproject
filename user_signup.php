<?php

include ('connection.php');

if(isset($_POST['submit']))
{
$sid=$_POST['sid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
// $email=$_POST['email'];
$password=$_POST['password'];
$contact=$_POST['contact'];

// $image=$_FILES['image']['name'];
// $tempimage=$_FILES['image']['tmp_name'];

// $directory="profile_images/".$image;

// $result=move_uploaded_file($tempimage, $directory);
// if (!$result) {
	
// 	die("Image not stored in folder".mysql_error());
// }
// else{
// $user="SELECT * FROM signup WHERE sapid='$sapid'";
// $query = mysqli_query($conn, $user);

// 	if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
// 		//echo "Username already exists!";
// 		header('location:main.php?exists');
// 	}
// 	else{

		$sql="INSERT INTO student(`sid`, `fname`, `lname`, `password`, `contact`, `dob`) VALUES ('$sid', '$fname', '$lname','$password', '$contact', '$dob')";

		if(mysqli_query($conn, $sql)) {
			
			// $to_email = $email;
			$subject = "Account Registration";
			$body = "Hi,".$fname." You are Registered Successfully";
			// $headers = "From: mmuhammadhamid514@gmail.com";

			// mail($to_email, $subject, $body, $headers);
			
			header('location:main.php?register');
		}
		else{

			//echo "Error";
			header('location:main.php?No_register');
		}
	}
?>