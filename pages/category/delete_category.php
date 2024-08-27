<?php 

include('../../includes/conn.php');

$get_id=$_GET['category_id'];

mysqli_query($con,"delete from categories where category_id = '$get_id' ")or die(mysql_error());

header('location:add_category.php');
?>