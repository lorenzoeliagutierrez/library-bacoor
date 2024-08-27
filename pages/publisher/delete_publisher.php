<?php 

include('../../includes/conn.php');

$get_id=$_GET['publisher_id'];

mysqli_query($con,"delete from tbl_publishers where publisher_id = '$get_id' ")or die(mysql_error());

header('location:publisher.php');
?>