<?php 

include('../../includes/conn.php');

$get_id=$_GET['campus_id'];

mysqli_query($con,"delete from campus where campus_id = '$get_id' ")or die(mysqli_error($con));

header('location:campus.php');
?>