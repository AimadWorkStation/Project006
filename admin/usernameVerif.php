<?php 

	include_once 'connect.php';

	$val = $_POST['val'];
	$stmt = $con -> prepare("select UserName from users where Username = '". $val ."'");
	$stmt -> execute();
	$count = $stmt -> rowCount();
	if($count > 0){
		echo "true";
	}
	else{
		echo "false";
	}

