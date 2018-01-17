<?php 
	
	include_once 'connect.php';
	$id = $_POST['id'];
	try {
		if($_POST['stat'] == 'active')
		$stmt = $con->prepare("update users set RegStatus = 1 where UserID = $id");
		else $stmt = $con->prepare("update users set RegStatus = 0 where UserID = $id");
		$stmt -> execute();
		echo "true";
	} catch (Exception $e) {
		echo "false";
		}
	

	
