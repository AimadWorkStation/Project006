<?php 
	$id = $_POST['id'];
	include_once 'connect.php';
	try {
		$stmt = $con->prepare("delete from users where UserID = ".$id);
		$stmt -> execute();
		echo "true";
	} catch (Exception $e) {
		echo "false";
		}
	

	



 