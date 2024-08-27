<?php 

include('../../includes/conn.php');

$get_id=$_GET['ebook_id'];

mysqli_query($con,"delete from ebooks where ebook_id = '$get_id' ")or die(mysql_error());
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>