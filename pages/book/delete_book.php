<?php 

include('../../includes/conn.php');

$get_id=$_GET['book_id'];

mysqli_query($con,"delete from book where book_id = '$get_id' ")or die(mysql_error());
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>