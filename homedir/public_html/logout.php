<?php

	session_start();
session_destroy();
	unset($_SESSION['user']);

	//header("location:".$_SERVER['HTTP_REFERER']);

	header("location:login.php");

?>