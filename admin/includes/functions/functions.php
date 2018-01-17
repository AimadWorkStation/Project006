<?php 

	// title Function
	//if page has $pageTitile just like the navbar $noNavbar variable or defult title

	function getTitle(){
		global $pageTitle;

		if(isset($pageTitle)){
			echo $pageTitle;
		}
		else{
			echo "Default";
		}
	}
	
	/*
	--for any error at any page redirect to -> v2.0
	function($errorMsg,$page, $secondBeforeRedirecting)
	 */

	function redirectHome($Msg,$page,$second = 3){
		echo $Msg;
		echo "<div class='alert alert-info'>redirect in ". $second ." seconds.";

		header("refresh: $second; url=$page");
		exit();
	}


	/*
	count number of items function v2.0
	 */
	function countItems($item,$table,$fielsCondition = '0',$condition = '0'){
		global $con;
		if($condition === '0'){
			$stmt2 = $con -> prepare("select count($item) from $table");
		}
		else{
			$stmt2 = $con -> prepare("select count($item) from $table where $fielsCondition = $condition");
		}
		
		$stmt2 -> execute();

		return $stmt2 -> fetchColumn();
	}
	
	/*
	get latest items v1.0
	 */
	function getlatest($item,$table,$order,$limit=5){
		global $con;
		$stmt1 = $con -> prepare("SELECT $item from $table ORDER BY $order DESC LIMIT $limit");
		$stmt1 -> execute();
		$row = $stmt1 -> fetchAll();
		return $row;
	}