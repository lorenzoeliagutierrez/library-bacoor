<?php 

include('../../includes/conn.php');

$get_id=$_GET['thesis_id'];

mysqli_query($con,"delete from special_collection where thesis_id = '$get_id' ")or die(mysql_error());

header('location:' . $_SERVER['HTTP_REFERER']);
?>