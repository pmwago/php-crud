<?php
SESSION_START();
include 'database.php';
if(isset($_POST['submit'])){
  $code=$_POST['code'];
  $name=$_POST['uname'];
  $sem=$_POST['sem'];
  $year=$_POST['year'];
  $lec=$_POST['lec'];

  $sql="insert into details (Course_code,Course_name,Semester_stage,Year,Lecturer)
  values('$code','$name',$sem,$year,'$lec')";

  $result=mysqli_query($conn,$sql);

  if($result){
    $_SESSION['status']="inserted successfully";
    header('location:read.php');
  }
  else{
    die(mysqli_error($conn));
  }
}
if(isset($_POST['cancel'])){
  header('location:read.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Create operations</title>
  </head>
  <body>
    <div class="container my-5">
    <form method="POST">
    <div class="form-group">
    <label>Unit Code</label>
    <input type="text" class="form-control" placeholder="Enter unit code" name="code" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Unit Name</label>
    <input type="text" class="form-control" placeholder="Enter unit name" name="uname" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Semester</label>
    <input type="text" class="form-control" placeholder="Enter semester stage" name="sem" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Year</label>
    <input type="text" class="form-control"  placeholder="Enter year" name="year" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Lecturer</label>
    <input type="text" class="form-control"  placeholder="Enter lecturer's name" name="lec" autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <button type="submit" class="btn btn-danger float-right" name="cancel">Cancel</button>
</form>
    </div>
  </body>
</html>