<?php 

	function lang($sentence){

		//static to say to the compilare that this is not dynamic for not calling it everytime.
		static $lang =array(


			//Homepage
			'Message' => 'Welcom',
			'Admin'=> 'administrator'
		);
		return $lang[$sentence];
	}
