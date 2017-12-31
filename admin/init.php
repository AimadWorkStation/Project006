<?php 
	// Connection
	include 'connect.php';
	//routes

	//template directory
	$tpl = 'includes/templates/';
	//language path
	$lang = 'includes/languages/';
	//functions path
	$func = 'includes/functions/';
	//css path
	$css = 'layout/css/';
	//js path
	$js = 'layout/js/';
	


	//important files 
	include $func .'functions.php';
	include $lang .'english.php';
	include $tpl. 'header.inc';

	//include navbar on all pages expect those who has $noNavbar variables

	if(!isset($noNavbar)){
		include $tpl. 'navbar.inc';
	}
	
	