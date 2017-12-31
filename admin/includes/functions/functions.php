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
	

