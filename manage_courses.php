<?php

include ('connection.php');

if(isset($_POST['submit']))
{
$course=$_POST['course'];


$user="SELECT * FROM courses WHERE course='$course'";
$query = mysqli_query($conn, $user);

  if(mysqli_num_rows($query) > 0 ) { //check if there is already an entry for that username
    //echo "Username already exists!";

    header('location:?exists');
  }
  else{

    //echo "chutti";
    $sql="INSERT INTO courses(`course`) VALUES ('$course')";

    if(mysqli_query($conn, $sql)) {
      
      
      header('location:?inserted');
      //echo "data not insert";
    }
    else{

      //echo "Error";
      header('location:?No_inserted');
    }

  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add/Manage Courses</title>

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
              Add/Manage Courses
            </div>
            <div class="card-body">
              <a class="btn btn-primary mb-3" href="" data-bs-toggle="modal" data-bs-target="#Add_Course_Modal">Add Courses</a>
              <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>CId</th>                      
                      <th>Course Name</th>
                      <th>Delete</th>
                      <th>Update</th>
                    </tr>
                  </thead>
                  <?php
                    include ('connection.php');

                   
                    $record="SELECT * FROM courses";

                    $x= (mysqli_query($conn, $record));

                    while ($row= mysqli_fetch_array($x)) {
                      ?>
                  <tbody>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['course']; ?></td>
                        

                        <td><a href="delete_courses.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm text-light">Delete</a></td>
                        <td><a href="update_courses.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm text-light">Update</a></td>

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


  <!----------------------------------- Modal for Admin Add Courses --------------------------------------->
  
    <!-- Modal -->
    <div class="modal fade" id="Add_Course_Modal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background: #1f1f2e; height: 100px;">

            <h2 class="">Add Courses</h2>
            
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <h4 class="modal-title"></h4>
          </div>
          <div class="modal-body" style="background-image: linear-gradient(#000066,#ffffff);">
            
            <section class="logsection">
               <div class="logform">

                  <?php 
                              
                       if(isset($_GET['exists']))
                       {
                                 
                           echo '<script>alert("This course name already exists.")</script>';
                       }

                        if(isset($_GET['inserted']))
                        {
                                    
                            echo '<script>alert("Course Added Successfully")</script>';
                        }

                        if(isset($_GET['No_inserted']))
                        {
                                    
                            echo '<script>alert("Course not added please try Again.")</script>';
                        }

                  ?>

                  <form action="" method="POST">

                  <label for=""><b>New Course</b></label>
                  <span id="" class="require"></span><br>
                  <input type = "text" id  ="" name="course" placeholder = "Enter New Course" required="value"><br><br>
                  <button type = "submit"id = "submits" name="submit"><b>Add Course</b></button>
                  </form>
                </div>
            </section>

          </div>
          <div class="modal-footer" style="background: #1f1f2e;">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
        
      </div>
    </div>

    <?php 
                              
                       if(isset($_GET['updated']))
                       {
                                 
                           echo '<script>alert("Updated course Successfully")</script>';
                       }

                        if(isset($_GET['no_updated']))
                        {
                                    
                            echo '<script>alert("Course not Updated please try Again")</script>';
                        }

                        

                  ?>

</body>
</html>