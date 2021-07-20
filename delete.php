<?php
SESSION_START();
include 'database.php';
if(isset($_GET['number'])){
    $number=$_GET['number'];

    $sql="delete from details where Serial_no=$number";

$result=mysqli_query($conn,$sql);
if($result){
  $_SESSION['status']="deleted successfully";
  header('location:read.php');
}
else{
    echo "error!";
}
}
?>