<?php 

	function lang($sentence){

		//static to say to the compilare that this is not dynamic for not calling it everytime.
		static $lang =array(
			'Message' => 'مرحبا',
			'Admin'=> 'المدير'
		);
		return $lang[$sentence];
	}