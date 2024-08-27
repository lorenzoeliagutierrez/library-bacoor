<?php 

include('../../includes/conn.php');

$get_id=$_GET['user_id'];

mysqli_query($con,"delete from admin where admin_id = '$get_id' ")or die(mysql_error());

header('location:librarian_list.php');
?>