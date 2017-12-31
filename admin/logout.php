<?php 
	
	//start session first of all
	session_start();

	session_unset();

	session_destroy();

	header('Location: index.php');

	exit();

 