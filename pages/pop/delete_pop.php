<?php 

include('../../includes/conn.php');

$get_id=$_GET['pop_id'];

mysqli_query($con,"delete from tbl_placeofpublications where pop_id = '$get_id' ")or die(mysql_error());

header('location:pop.php');
?>