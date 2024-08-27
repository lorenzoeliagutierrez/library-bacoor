<?php 

include('../../includes/conn.php');

$get_id=$_GET['thesis_id'];

mysqli_query($con,"delete from arc_special_collection where thesis_id = '$get_id' ")or die(mysql_error());
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>