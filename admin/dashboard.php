<?php 
	session_start();
	//print_r($_SESSION);
	if(isset($_SESSION['Username'])){
		$pageTitle = 'Dashboard';
		include 'init.php';

		print_r($_SESSION);

		include $tpl. 'footer.inc';
	}



	else{
		//if trying to access to dashbord page directly without signed in
		header('Location: index.php');	
		exit();
	} 