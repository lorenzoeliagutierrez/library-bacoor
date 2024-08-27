<?php 

include('../../includes/conn.php');

$get_id=$_GET['user_id'];

mysqli_query($con,"delete from user where user_id = '$get_id' ")or die(mysql_error());

header('location:user.php');
?>