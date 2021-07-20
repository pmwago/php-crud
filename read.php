<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Read operations</title>
</head>
<body>
  <?php
SESSION_START();
  if(isset($_SESSION['status'])){
    echo $_SESSION['status'];
    unset( $_SESSION['status']);
  }
  ?>
    <div class="container my-5">
    <button class="btn btn-primary my-5"><a href="create.php" class="text-light">Add Course</a></button>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Serial Number</th>
      <th scope="col">Unit Code</th>
      <th scope="col">Unit Name</th>
      <th scope="col">Semester Stage</th>
      <th scope="col">Year</th>
      <th scope="col">Lecturer</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  <?php
include 'database.php';
$sql = "select * from details";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {

    $number=$row['Serial_no'];
    $code = $row['Course_code'];
    $name = $row['Course_name'];
    $sem = $row['Semester_stage'];
    $year = $row['Year'];
    $lec = $row['Lecturer'];
    echo '<tr>
    <th scope="row">'.$number.'</th>
    <td>'.$code.'</td>
    <td>'.$name.'</td>
    <td>'.$sem.'</td>
    <td>'.$year.'</td>
    <td>'.$lec.'</td>
    <td>
    <button class="btn btn-primary"><a href="update.php?no='.$number.'" class="text-light">Update</a></button>
    <button class="btn btn-danger"><a href="delete.php?number='.$number.'" class="text-light">Delete</a></button>
    </td>
</tr>';
}
?>
  </tbody>
</table>
</div>
</body>
</html>