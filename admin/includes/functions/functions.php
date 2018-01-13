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
	count number of items function v1.0
	 */
	function countItems($item,$table){
		global $con;
		$stmt2 = $con -> prepare("select count($item) from $table");
		$stmt2 -> execute();

		return $stmt2 -> fetchColumn();
	}
	