<?php
session_start();
ob_start();
include "conn.php";

if (empty($_SESSION['role'])) {
    header('location:../../pages/login/login.php');
}
$id_session = $_SESSION['userid'];
?>

