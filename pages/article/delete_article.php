<?php 

include('../../includes/conn.php');

$get_id=$_GET['article_id'];

mysqli_query($con,"delete from tbl_articles where article_id = '$get_id' ")or die(mysql_error());
echo "<script>alert('Successfully deleted!');history.go(-1);</script>";
?>