<?php
	// remove all session variables
	session_start();
	session_unset();

	// destroy the session 
	session_destroy(); 
	session_start();
	$_SESSION['logedout_success'] = true;
	header("location:login.php");
?>