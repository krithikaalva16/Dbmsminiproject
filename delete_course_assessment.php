<?php
include ('connection.php');

$sql="DELETE FROM quiz WHERE id='" .$_GET['id']. "'";

if(mysqli_query($conn, $sql)){

	header('location:manage_course_assessment.php');
	//echo "delete successfully";
}
else{


	header('location:manage_course_assessment.php');
	//echo "error";
}

?>

