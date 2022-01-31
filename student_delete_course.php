<?php
error_reporting(0);
include ('connection.php');

$sql="DELETE FROM student_course WHERE sid='".$_GET['sid']."' AND course='" .$_GET['course']. "' ";

//$sql="DELETE faculty FROM faculty INNER JOIN faculty_course ON faculty_course.id = faculty.f_id WHERE faculty.f_id='" .$_GET['f_id']. "'";
echo $sql;
if(mysqli_query($conn, $sql)){

	header('location:student_manage_course.php');
	//echo "delete successfully";
}
else{


	header('location:student_manage_course.php');
	//echo "error";
}

?>

