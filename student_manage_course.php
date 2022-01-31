<?php
error_reporting(0);
session_start();
include ('connection.php');

if(isset($_POST['submit']))
{
$sid=$_POST['sid'];
$course=$_POST['course'];


$sql="SELECT * FROM student_course WHERE sid='$sid' AND course='$course'";
$query = mysqli_query($conn, $sql);

  if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
    //echo "Username already exists!";
    //header('location:student_manage_course.php');
  }
  else{

    $sql="INSERT INTO student_course(`sid`, `course`) VALUES ('$sid', '$course')";

    if(mysqli_query($conn, $sql)) {
      
      //echo "success";
     // header('location:student_manage_course.php');
    }
    else{

      //echo "Error";
      //header('location:student_manage_course.php');
    }

  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add/Manage Faculty</title>

  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="icon" type="image/jpg" href="images/icon.jpg">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Latest compiled and minified CSS  "SELECT * FROM signup INNER JOIN finance_entry ON signup.cnic=finance_entry.cnic WHERE signup.cnic='$cnic'";      -->
  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>
<body>

  <div class="card mb-3">
            <div class="card-header">
              <!-- Add/Manage Course -->
            </div>
            <div class="card-body">
             <a class="btn btn-primary mb-3" href="" data-bs-toggle="modal" data-bs-target="#Add_Course_Modal">Enroll Courses</a>
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Sid</th>                      
                      <th>Course Name</th>
                      <!-- <th>Delete</th> -->
                    </tr>
                  </thead>
                  <?php
                    include ('connection.php');

                   
                    $record="SELECT * FROM student_course WHERE sid = '" .$_GET['sid']. "'";
                    //$record="SELECT * FROM faculty LEFT JOIN faculty_course ON faculty.f_id=faculty_course.id";

                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['sid']; ?></td>
                      <td><?php echo $row['course']; ?></td>
 
                        <td><a href="student_delete_course.php?sid=<?php echo $row['sid']; ?>&course=<?php echo $row['course']; ?>" class="btn btn-danger btn-sm text-light">Delete</a></td>

                    </tr>
                  </tbody>
                  <?php

                    }


                    ?>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted"></div>
          </div>

    <!----------------------------------- Modal for Student Add Courses --------------------------------------->
  
    <!-- Modal -->
    <div class="modal fade" id="Add_Course_Modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background: #000000; height: 100px;">

            <h2 class="">Add Courses</h2>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body" style="background-image: linear-gradient(#000066,#ffffff);">
            
            <section class="logsection">
               <div class="logform">

                  <form action="" method="POST">

                  <input type="text" name="sid" value="<?php echo $_GET['sid']; ?>">
                  
                  <?php
          $sql = "SELECT DISTINCT course FROM courses";
          $result = $conn->query($sql);
              echo "<select name='course'>";
              while ($row = $result->fetch_assoc()) {
                  unset($course);
                  $course = $row['course'];
                  echo '<option value="'.$course.'"  >'.$course.'</option>';
              }
              echo "</select>";
          ?>
                  <button type="submit" id="submits" name="submit"><b>Enroll Course</b></button>
                  </form>
                </div>
            </section>

          </div>
          <div class="modal-footer" style="background: #000000;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
        
      </div>
    </div>

    <?php 
                              
                       if(isset($_GET['updated']))
                       {
                                 
                           echo '<script>alert("Updated Member Data Successfully")</script>';
                       }

                        if(isset($_GET['no_updated']))
                        {
                                    
                            echo '<script>alert("Not Updated please try Again")</script>';
                        }


                         if(isset($_GET['exist']))
                       {
                                 
                           echo '<script>alert("This course  already enrolled.")</script>';
                       }

                        if(isset($_GET['enroll']))
                        {
                                    
                            echo '<script>alert("Course Enrolled Successfully")</script>';
                        }

                        if(isset($_GET['no_enroll']))
                        {
                                    
                            echo '<script>alert("Course not enrolled please try Again.")</script>';
                        }

                        

                  ?>


</body>
</html>