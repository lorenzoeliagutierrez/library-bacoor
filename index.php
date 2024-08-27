<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header ('Location: index/basco-html/index.html');
	}
?>