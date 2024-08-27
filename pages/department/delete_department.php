<?php 

include('../../includes/conn.php');

$get_id=$_GET['department_id'];

mysqli_query($con,"delete from department where department_id = '$get_id' ")or die(mysqli_error($con));

header('location:department.php');
?>