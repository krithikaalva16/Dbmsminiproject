<?php
include ('connection.php');

$sql="DELETE FROM student WHERE sid='" .$_GET['sid']. "'";

if(mysqli_query($conn, $sql)){

	header('location:user_table.php');
	//echo "delete successfully";
}
else{


	header('location:user_table.php');
	//echo "error";
}

?>

