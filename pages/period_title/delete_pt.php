<?php 

include('../../includes/conn.php');

$get_id=$_GET['pt_id'];

mysqli_query($con,"delete from tbl_periodical_titles where pt_id = '$get_id' ")or die(mysqli_error($con));

header('location:add_pt.php');
?>