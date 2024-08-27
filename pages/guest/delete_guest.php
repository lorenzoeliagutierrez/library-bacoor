<?php 

include('../../includes/conn.php');

$get_id=$_GET['guest_id'];

mysqli_query($con,"delete from guest where guest_id = '$get_id' ")or die(mysql_error());

header('location:guest.php');
?>