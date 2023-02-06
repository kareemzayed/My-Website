<?php 
	session_start();
	if(isset($_SESSION['user'])) {
		session_unset();
		session_destroy();
		header("location:Intro.php");
		exit;
	} 
	else {
		header("location:Intro.php");
		exit;
	}
?>