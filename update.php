<?php
SESSION_START();
include 'database.php';

$number=$_GET['no'];

  $sql = "select * from details where Serial_no=$number";
  //$result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result=mysqli_query($conn,$sql));
      $code=$row['Course_code'];
      $name = $row['Course_name'];
      $sem = $row['Semester_stage'];
      $year = $row['Year'];
      $lec = $row['Lecturer'];

if(isset($_POST['update'])){

  $code=$_POST['code'];
  $name=$_POST['uname'];
  $sem=$_POST['sem'];
  $year=$_POST['year'];
  $lec=$_POST['lec'];

  $sql="Update details set Serial_no=$number,Course_code='$code',Course_name='$name',
  Semester_stage=$sem,Year=$year,Lecturer='$lec' where Serial_no='$number' ";

$result= mysqli_query($conn,$sql);
if($result){
  $_SESSION['status']="updated successfully";
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
    <input type="text" class="form-control" placeholder="Enter unit code" name="code" autocomplete="off" value="<?php echo $code;?>">
  </div>
  <div class="form-group">
    <label>Unit Name</label>
    <input type="text" class="form-control" placeholder="Enter unit name" name="uname" autocomplete="off" value="<?php echo $name;?>">
  </div>
  <div class="form-group">
    <label>Semester</label>
    <input type="text" class="form-control" placeholder="Enter semester stage" name="sem" autocomplete="off" value="<?php echo $sem;?>">
  </div>
  <div class="form-group">
    <label>Year</label>
    <input type="text" class="form-control"  placeholder="Enter year" name="year" autocomplete="off" value="<?php echo $year;?>">
  </div>
  <div class="form-group">
    <label>Lecturer</label>
    <input type="text" class="form-control"  placeholder="Enter lecturer's name" name="lec" autocomplete="off" value="<?php echo $lec;?>">
  </div>
  <button type="submit" class="btn btn-primary" name="update">Update</button>
  <button type="submit" class="btn btn-danger float-right" name="cancel">Cancel</button>
</form>
    </div>
  </body>
</html>