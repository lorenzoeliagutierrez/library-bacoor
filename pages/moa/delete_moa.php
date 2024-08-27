<?php 

include('../../includes/conn.php');

$get_id=$_GET['moa_id'];

mysqli_query($con,"delete from tbl_moa where moa_id = '$get_id' ")or die(mysql_error());

header('location:moa.php');
?>